<?php 
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}

?>
<!DOCTYPE html>
<html>
<head>
  <?php include 'add_ons_head.php'; ?>
    <?php
    include_once("connection.php");
    $con = new JobClass;
    $err_img="";
    
            if(isset($_REQUEST['signin']))
            {
               $u=$_REQUEST["ad_user_name"];
               $p=$_REQUEST["password"];
              $sql="select * from adminlogin where ad_email='$u' and password='$p'";
              $con = mysqli_connect("localhost","root","","job180") or die(mysql_error());
             // $res=mysqli_query($con,$sql);
               // $rc=mysqli_num_array($res);
              //  echo $rc;

            $result = mysqli_query($con,$sql) or die(mysql_error());
            $rows = mysqli_num_rows($result);

                if($rows>0)
                {
                   $row=mysqli_fetch_array($result);
                  $_SESSION['user_name']=$row['1'];
                   $_SESSION['email']=$row['2'];
                   $_SESSION['photo']=$row['3'];
                   $_SESSION['password']=$row['4'];
                  header("location:dashboard.php");
                }

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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Job</b>180</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="user name (email id or phone nummber)" name="ad_user_name">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
           
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" class="btn btn-primary btn-block btn-flat" name="signin" value="sign in">
        </div>
        <!-- /.col -->
      </div>
    </form>
<?php
  
?>

    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    

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
