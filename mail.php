<?php
if(empty($_POST["name"]) || empty($_POST["mail"]) || empty($_POST["subject"]) || empty($_POST["message"])){ exit("Hata, Eksik Giriş Yaptınız");}
require '/usr/share/php/libphp-phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication

$mail->Username = '#@gmail.com';                 // SMTP username
$mail->Password = '#';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted

$mail->From = 'berkanoguz@gmail.com';
#$mail->FromName = 'Mailer';
$mail->addAddress('berkanoguz@gmail.com', 'Berkan Oguz');     // Add a recipient
#$mail->addAddress('ellen@example.com');               // Name is optional
#$mail->addReplyTo('info@example.com', 'Information');
#$mail->addCC('cc@example.com');
#$mail->addBCC('bcc@example.com');

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
#$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
#$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
#$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = strip_tags($_POST["name"]);
$mail->Body = strip_tags($_POST["email"].": ".$_POST["subject"].", ". $_POST["message"]); 
#$mail->Subject = "Merhaba";
#$mail->Body = "Berkan";
header( "refresh:3;url=index.html" );
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Mesajınız Gönderildi Sayfaya tekrar yönlendiriliyorsunuz';
}

?>

