<?php

include('smtp/PHPMailerAutoload.php');
// echo smtp_mailer($email, $fname, $lname);
// function smtp_mailer($email, $fname, $lname){
	$mail = new PHPMailer(); 
	// $mail->SMTPDebug=3;
	
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'ssl'; //ssl or tsl
	$mail->Host = "smtp.gmail.com"; //hostname
	$mail->Port = 465; //port
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "developersam111@gmail.com"; //username
	$mail->Password = 'yimbprghrdxvahbg'; //password
	$mail->SetFrom("developersam111@gmail.com"); //from email address
	$mail->FromName   = 'Developer Sam'; //from name
	// $mail->addAttachment('uploads/file.tar.jpg'); //attechment files
// 	$email_template = '<html>
//     <body>
//         <h1>Thank you for Register on our website.</h1>
//         <p>Please verify your email address. just click on verify button.</p>
 
//         <a href="">Verify EMAIL</a>
 
        
//     </body>
// </html>';

$email_template = 'php/mail_template.html';

	$name = $name;
 	$link = "http://localhost/listing/verify.php?vcode=$verification_code&vemail=$email";
 
$message = file_get_contents($email_template);
$message = str_replace('%name%', $name, $message);
$message = str_replace('%link%', $link, $message);



	$mail->Subject = "Please verify your email address"; //$subject
	$mail->Body = $message; // $msg
	$mail->AddAddress($email); // $to
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));

	if(!$mail->Send()){
		echo $mail->ErrorInfo;
		
	}
	// else{
	// 	echo 'Sent';
	// }
// }
?>