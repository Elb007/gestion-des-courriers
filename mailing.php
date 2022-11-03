<?php
$from="med.elbachiri19@hotmail.com";
$email=$_POST['email'];
$sujet=$_POST['sujet'];
$message=$_POST['message'];
if(mail($email, $sujet, $message,"From:".$from))
echo "Message envoyé";
else
echo "Erreur";

?>
