<?php
// Please specify your Mail Server - Example: mail.example.com.
	// ini_set("SMTP","smtp.gmail.com");

	// // Please specify an SMTP Number 25 and 8889 are valid SMTP Ports.
	// ini_set("smtp_port","465");

	// // Please specify the return address to use
	// ini_set('sendmail_from', 'vaghelajanak97145@gmail.com');
	// the message
$to="vaghelajanak97@gmail.com";
$subject="test";
$msg = "First line of text\nSecond line of text";
$headers="From: vaghelajanak97145@gmail.com";
// use wordwrap() if lines are longer than 70 characters
//$msg = wordwrap($msg,70);

// send email
if(mail($to,$subject,$msg,$headers)){
	echo "sent";
}else{
	echo "not sent";
}
?>