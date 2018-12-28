<!DOCTYPE html>
<html>
<head>
  <?php include 'add_ons_head.php'; ?>
    <?php
    include_once("connection.php");
    $con = new JobClass;
    $err_img="";
    $a="";
    //session_start();

      //   $con=mysqli_connect("localhost","root","","job180");
            if(isset($_POST['submit']))
            {
               $u=$_POST["user_name"];
               $sql="select * from adminlogin where ad_email='$u' ";
              $con = mysqli_connect("localhost","root","","job180") or die(mysql_error());
             // $res=mysqli_query($con,$sql);
               // $rc=mysqli_num_array($res);
              //  echo $rc;

            $result = mysqli_query($con,$sql) or die(mysql_error());
            $rows = mysqli_num_rows($result);

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
 ?> <label for="cpassword">New Password will be sent.Check your Email...</label>   <?php
} catch (phpmailerException $e) {
   
   $a= "Message Sent OK </p>\n";

  //echo $e->errorMessage(); //Pretty error messages from PHPMailer
} catch (Exception $e) {
  echo $e->getMessage(); //Boring error messages from anything else!
}


                if($rows>0)
                {
                   $row=mysqli_fetch_array($result);


                 //  echo $row['password'];
                   echo "<script>alert('Password:".$row['password']."');</script>";

                }


            }
 ?>

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

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,

  600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Job</b>180</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <?php echo $a; ?>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="user name (email id or phone nummber)" name="user_name">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
           
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="submit">
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="index.php">Back To Login</a><br>
  

    <!-- /.social-auth-links -->
<!-- 
    <a href="#">I forgot my password</a><br>
 -->    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
