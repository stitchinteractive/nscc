<?php

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "mail.stitchinteractive.sg";
$mail->Port = 587;
$mail->IsHTML(true);
$mail->Username = "tanboanc@web221.vodien.com";
$mail->Password = "Obvious123!";
$mail->SetFrom("tanboanc@web221.vodien.com");
$mail->Subject = "Test";
$mail->Body = "hello";
$mail->AddAddress("email@vodien.com");
if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message has been sent";
}
?>