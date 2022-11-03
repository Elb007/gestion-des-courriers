<?php
require 'vendor/autoload.php';
use Plivo\RestClient;
$client = new RestClient("<auth_id>","<auth_token>");
$response = $client->messages->create(
   [  
        "src" => "<sender_id>",
        "dst" => "<destination_number>",
        "text"  =>"Appointment reminder: 12:00 noon tomorrow. Please reply to this message if you need to make a change",
   ]
);
print_r($response);
?>
