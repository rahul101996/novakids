<?php

use Google\Service\AndroidManagement\Display;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

use Google\Client;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
define('FCM_SERVER_KEY', '15NOPvhWR5E_zst4r_hoD1VIhW82tRt-qMTyIe4-OW8');

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

        
                // echo $_SERVER['DOCUMENT_ROOT'].'/serviceAccountKey.json';
                // 1. Retrieve data from the form
    $notificationTitle = $_POST['title'] ?? 'Default Title';
    $notificationBody = $_POST['body'] ?? 'Default Body';
    $imageUrl = "https://media-cldnry.s-nbcnews.com/image/upload/t_fit-1240w,f_auto,q_auto:best/newscms/2015_02/835681/150106-mia-khalifa-830a.jpg";
    $clickActionUrl = !empty($_POST['click_action_url']) ? $_POST['click_action_url'] : null;

    // Initialize Google Client for authentication
    $client = new Client();
    $client->setAuthConfig($_SERVER['DOCUMENT_ROOT'] . '/serviceAccountKey.json');
    $client->addScope('https://www.googleapis.com/auth/firebase.messaging');

    try {
        // Get OAuth2 access token
        $accessToken = $client->fetchAccessTokenWithAssertion()['access_token'];

        $projectId = 'nova-7626d'; // Your Firebase Project ID
        $url = "https://fcm.googleapis.com/v1/projects/{$projectId}/messages:send";

        // Assuming $this->getData2("SELECT * FROM tbl_tokens") fetches all tokens
        // For demonstration, let's use a placeholder array if you're testing outside a class context
        // $tokens = [['token' => 'YOUR_FCM_DEVICE_TOKEN_1'], ['token' => 'YOUR_FCM_DEVICE_TOKEN_2']];
        $tokens = getData2("SELECT * FROM tbl_tokens");


        foreach ($tokens as $token) {
            // Build the base message payload
            $messagePayload = [
                'token' => $token["token"],
                'notification' => [
                    'title' => $notificationTitle,
                    'body' => $notificationBody,
                ],
            ];

            // Add image URL if provided
            if ($imageUrl) {
                // Common image field for notification on Android, Web, and APNs (Apple)
                // Note: The structure for images can be platform-specific.
                // We'll add it to the notification block and also to platform-specific options for broader compatibility.
                // Firebase automatically handles the best way to display the image based on the device.
                $messagePayload['android']['notification']['image'] = $imageUrl;
                $messagePayload['apns']['fcm_options']['image'] = $imageUrl;
                $messagePayload['webpush']['headers']['image'] = $imageUrl; // As shown in facts
            }

            // Add click action URL if provided
            if ($clickActionUrl) {
                // For web, 'link' in fcm_options is typically used for opening a URL.
                $messagePayload['webpush']['fcm_options']['link'] = $clickActionUrl;
                // For Android, `click_action` usually refers to an intent action, not a direct URL.
                // If you want to open a URL on Android, you might need to send it in the `data` payload
                // and handle it within your app's code. For simplicity, we'll focus on web here.
            }
            
            // Construct the full message for FCM API
            $fcmMessage = ['message' => $messagePayload];

            $options = [
                'http' => [
                    'header' => [
                        "Authorization: Bearer $accessToken",
                        "Content-Type: application/json"
                    ],
                    'method' => 'POST',
                    'content' => json_encode($fcmMessage)
                ]
            ];

            $context = stream_context_create($options);
            $result = file_get_contents($url, false, $context);

            echo "Response for token {$token['token']}: " . $result . "\n";
        }

    } catch (Exception $e) {
        // Handle authentication or API errors gracefully
        echo "Error: " . $e->getMessage() . "\n";
        // Optionally log the full stack trace for debugging
        // error_log($e->getTraceAsString());
    }
                
                
                
                redirect("/notify");

                




        }
    }
}
