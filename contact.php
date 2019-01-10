<?php
//$result="";
if (isset($_POST['sub'])) {

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'priyankasamant061@gmail.com';                 // SMTP username
$mail->Password = '12345priya';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom($_POST['email'],$_POST['name']);
$mail->addAddress('priyankasamant061@gmail.com');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo($_POST['email'],$_POST['name']);
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'form submission'.$_POST['subject'];
$mail->Body    = '<h1>Name :'.$_POST['name'].'<br>Email :'.$_POST['email'].'<br>Message:'.$_POST['body'].'</h1>';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>contect form</title>
</head>
<body>
<form action="" method="post">
	<h3>name:</h3>
	<input type="text" name="name" placeholder="name">
	<h3>email:</h3>
	<input type="text" name="email" placeholder="email">
	<h3>subject:</h3>
	<input type="text" name="subject" placeholder="write subject">
	<h3>body:</h3>
	<input type="text" name="body" placeholder="write Message">
	<input type="Submit" name="sub" value="Send">
</form>
</body>
</html>