<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

date_default_timezone_set('Etc/UTC');

require 'vendor/autoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;

$mail->Username = 'soen287.2020F.team6@gmail.com';
$mail->Password = 'xdhbmeiixmbdyyfk';                       //App password.
$mail->setFrom('soen287.2020F.team6@gmail.com', 'PC4U');
$mail->addAddress($_SESSION['email']);

$mail->isHTML(true);

$mail->Subject = $_SESSION['subject'];
$mail->Body = $_SESSION['body'];

if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
?>