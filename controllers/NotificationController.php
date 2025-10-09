<?php

use Google\Service\AndroidManagement\Display;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';


class NotificationController
{
    private $db;
    public function __construct($db = null)
    {
        $this->db = $db;
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require("views/master/send-notification.php");
        } else {


            // Initialize Firebase with service account
            $factory = (new Factory)->withServiceAccount('serviceAccountKey.json');
            $messaging = $factory->createMessaging();

            // Fetch tokens from database
            $tokensData = getData2("SELECT token FROM `tbl_tokens` WHERE 1");

            // Extract plain token strings
            $tokens = array_column($tokensData, 'token');

            // Firebase allows max 500 tokens per multicast
            $chunks = array_chunk($tokens, 100);

            // Get title and body from POST (or set defaults)
            $title = $_POST['title'] ?? 'Default Title';
            $body = $_POST['body'] ?? 'Default Body';

            // Create notification
            $notification = Notification::create($title, $body);

            // Send in batches
            foreach ($chunks as $chunk) {
                $message = CloudMessage::new()->withNotification($notification);

                $report = $messaging->sendMulticast($message, $chunk);

                // Optional: Output results
                echo "Sent to {$report->successes()->count()} tokens.<br>";
                if ($report->failures()->count() > 0) {
                    foreach ($report->failures()->getItems() as $failure) {
                        echo "Failed: " . $failure->target()->value() . " — " . $failure->error()->getMessage() . "<br>";
                    }
                }
            }

            // redirect("/notify");
        }
    }
}
