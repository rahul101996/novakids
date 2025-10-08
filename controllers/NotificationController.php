<?php

use Google\Client;

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
            // redirect("views/master/send-notification");
            require("views/master/send-notification.php");
        } else {

            require 'vendor/autoload.php';



            // Load service account file
            $client = new Client();
            $client->setAuthConfig('serviceAccountKey.json');
            $client->addScope('https://www.googleapis.com/auth/firebase.messaging');

            // Get OAuth2 access token
            $accessToken = $client->fetchAccessTokenWithAssertion()['access_token'];

            // Display token (for debugging)
            // echo "Access Token: " . $accessToken . "\n";

            // Now send notification
            $projectId = 'nova-7626d';

            $url = "https://fcm.googleapis.com/v1/projects/{$projectId}/messages:send";

            $message = [
                'message' => [
                    // 'token' => 'fD5rTNQWBYGVeTC6C96wqN:APA91bECNFZcC6Kq9e50xlvhXIk_ZY2N8tp5U-8tnXSOKjMN9Y7PwNAXM0Rh_YHx4ZbOs4hRnhKyvPkmjkrQoIEmf0vw92wk9MGOPUbdjljvjw5nx3W1ixo',
                    'token' => 'ctI8RFFFt2B-e-hVHJmlhZ:APA91bHGDXJvNG0NdSucpODqHz_Mkmp_lK6dN_ccPJt8_J-WWjZaXu9iLYIhB0GKpuBDecqaoObJCk9hStdSJQmgDYVxNnP42Zx02z4pqF70XMWkiZC79hU',
                    'notification' => [
                        'title' => $_POST["title"],
                        'body' => $_POST["body"]
                    ]
                ]
            ];

            $options = [
                'http' => [
                    'header'  => [
                        "Authorization: Bearer $accessToken",
                        "Content-Type: application/json"
                    ],
                    'method'  => 'POST',
                    'content' => json_encode($message)
                ]
            ];

            $context  = stream_context_create($options);
            $result = file_get_contents($url, false, $context);
            echo $result;
            // redirect("/notify");
        }
    }
}
