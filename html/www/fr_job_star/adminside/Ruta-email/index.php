<?php 
$email="gabaniromit4892@gmail.com";
$temppass="123";
$password =random_password(8);
$from="gabaniromit4892@gmail.com";
	$to=$email;
$subject="Your password is change";
$message="your new password is $password";
require_once('class.phpmailer.php');
include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
$mail = new PHPMailer(true); // the true param means it will throw exceptions on errors, which we need to catch
$mail->IsSMTP(); // telling the class to use SMTP
try {
  $mail->Host       = "mail.yourdomain.com"; // SMTP server
  $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
  $mail->SMTPAuth   = true;                  // enable SMTP authentication
//  $mail->SMTPSecure = "ssl";
  $mail->Host       = "smtp.gmail.com"; // sets the SMTP server
  $mail->Port       = 587;                    // set the SMTP port for the GMAIL server
  $mail->Username   = "my.try172@gmail.com"; // SMTP account username
  $mail->Password   = "9376090760";        // SMTP account password
  $mail->AddReplyTo($to);
  $mail->AddAddress($to);
  $mail->SetFrom($from,$from);
  $mail->AddReplyTo($to);
  $mail->Subject = $subject;
  $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional - MsgHTML will create an alternate automatically
  $mail->MsgHTML($message);
 //$mail->AddAttachment('1.jpg');      // attachment
  //$mail->AddAttachment('admin/images/12.jpg'); // attachment
  $mail->Send();
 echo "Message Sent OK</p>\n";
 ?> <label for="cpassword">New Password will be sent.Check your Email...</label>	 <?php
} catch (phpmailerException $e) {
  echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}

//$query="update tbl_register set Password='$password' where Email='$email'";
//mysql_query($query) or die ('could not update:'.mysql_error());     
		
			//<!-- email sending end -->
	 ?>
			
			  <label for="cpassword">Invalid Email Address...</label>	
	<?php 	
function random_password($maxlen) {
          $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
          srand((double)microtime() * 1000000);
          $i = 0;
         $pass = '';

    while ($i <=$maxlen) {
    $num = rand() % 62;
        $tmp = substr($chars,$num,1);
        $pass = $pass.$tmp;
        $i++;
    }
return $pass;
  }	
		 
?>      