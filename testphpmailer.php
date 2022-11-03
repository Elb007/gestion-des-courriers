<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.hostinger.fr';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'med.elbachiri19@hotmail.com';
$mail->Password = 'Elb@ch!r!@2022';
$mail->setFrom('med.elbachiri19@hotmail.com', 'M. Elbachiri');
$mail->addReplyTo('med.elbachiri19@hotmail.com', 'M.A. elbachiri');
$mail->addAddress('med.samelbachiri@gmail.com', 'Med Elb');
$mail->Subject = 'Essai de PHPMailer';
$mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->Body = 'hello mr Mo Elb Yourmail is here Thank to join us';
//$mail->addAttachment('test.txt');
if (!$mail->send()) {
    echo 'Erreur de Mailer : ' . $mail->ErrorInfo;
} else {
    echo 'Le message a été envoyé.';
}
?>
