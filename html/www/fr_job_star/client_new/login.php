<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
$con = mysqli_connect("localhost","root","","job180") or die(mysql_error());

?>  
  <!-- Mirrored from demo.suavedigital.com/jobstar/job-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:41 GMT -->
  
  <head>
    <?php include_once("add_once_head.php");?>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-bg-white">
      <div class="container">
        <?php include('menu.php');?>
      <?php 
        if(isset($_GET['cmpid'])){
        $cid= $_GET['cmpid']; 
        $jid=$_GET['jid']; } 
        
        if(isset($_POST["btn_signin"]))
        {
         $con1=mysqli_connect("localhost","root","","job180") or die(mysql_error()); 
        $e=$_POST["email"];
        $p=$_POST["pwd"];
        $qry="select * from candidate_master where email_id='".$e."' and password='".$p."'";
        $result = mysqli_query($con1,$qry);
        $rows = mysqli_num_rows($result);
        if($rows == 1)
        {
        $r=mysqli_fetch_array($result);
        $_SESSION['key']=$r['serial_key'];
        header("location:job_details.php?cid=$cid&jid=$jid");
        }
        }
        ?>
        <section class="banner carousel slide" id="banner-carousel">
          <ol class="carousel-indicators">
            <li data-target="#banner-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#banner-carousel" data-slide-to="1"></li>
            <li data-target="#banner-carousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active" style="background:url(assets/images/banner-2.jpg); background-size:cover; background-attachment: fixed;">
              <div class="overlay"></div>
              <div class="container">
                <div class="content-wrap valign-wrap">
                  <div class="content valign-middle">
                    <div class="text-content col-md-8 col-md-offset-2 col-xs-12">
                      <div class="heading animated fadeInUp wow" data-wow-delay="0.7">
                        <div class="login-content">
                          <div class="login-header">
                            <h2><span style="color:#fcc512;">Sign In
                               </span></h2><br><br><br>
                          </div> <center>
                          <div class="login-body" style="width: 80%;">
                            <form action="" class="form-horizontal" method="post">
                              <input type="text" name="email" class="login-form def-input" placeholder="Email"><br><br>
                              <input type="password" name="pwd" class="login-form def-input" placeholder="Password">
                              <div class="remember-me-forgot-pw">
                                
                                <div class="col-md-6 no-padding text-right">
                                  <a href="#">Forgot your password?</a>
                                </div>
                              </div><br><br>
                              <input type="submit" class="sign-in" name="btn_signin" value="Sign In">


                            </form>
                            <div class="dont-have">Don't have an account yet? <a href="#" data-toggle="modal" data-target="#Register" data-dismiss="modal">Register now!</a></div>
                          </div></center>
                          </div><!--/.login-content-->
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          
        </body>
      </html>