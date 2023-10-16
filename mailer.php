<?php
$to = "asjtan@gmail.com";

$subject = "Test mail";

$message = "Hello! This is a test email message.";

$from = "asjtan@gmail.com";

$headers = "From:" . $from;

mail($to,$subject,$message,$headers);

echo "Mail Sent.";

?>