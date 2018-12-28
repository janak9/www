<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
$k=$_SESSION["c_key"];
}
if(!isset($_SESSION["c_key"]))
{
header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <?php 
        include_once("connection.php");
        $con = new JobClass;
        ?>
  <!-- Mirrored from demo.suavedigital.com/jobstar/job-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:41 GMT -->
    <?php include_once("add_once_head.php");?>
  
  <head>
  </head>
  <body>
   <nav class="navbar navbar-inverse navbar-fixed-top navbar-bg-white">
      <div class="container">
        <?php include('company_menu.php');?>
        <?php
        if(isset($_POST["btn_signin"]))
        {
         $con1=mysqli_connect("localhost","root","","job180") or die(mysql_error()); 
        $old_pwd=$_POST["old_pwd"];
        $new_pwd=$_POST["new_pwd"];
        $re_pwd=$_POST["re_pwd"];
        $qry="select * from company_master where serial_key='".$k."' and password='".$old_pwd."'";
        $result = mysqli_query($con1,$qry);
        $rows = mysqli_num_rows($result);
        if($rows == 1)
        {
          if($new_pwd==$re_pwd)
          {
            $cmp=mysqli_fetch_array($result);
            $data['password']=$new_pwd;
            $con->updatation("company_master",$data,"cmp_id",$cmp['cmp_id']);
            echo "<script>alert('Your Password Is Change');</script>";
          }
          else
          {
            $er_pwd="Does Not Metch Password";
          }

        }
        else
        {
          $er_pwd="Not Metch Old Passwword";
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
                            <div class="form-group">
                              <input type="password" name="old_pwd" class="login-form def-input" placeholder="Old Password">
                            </div>
                            <div class="form-group">
                              <input type="password" name="new_pwd" class="login-form def-input" placeholder="New Password">
                            </div>
                            <div class="form-group">
                              <input type="password" name="re_pwd" class="login-form def-input" placeholder="Confrim Password">
                              </div>
                              <?php if(isset($er_pwd)){ echo "<p style='color:red'>$er_pwd</p>"; } ?>
                              <br><br>
                            <div class="form-group">
                              <input type="submit" class="def-btn btn-bg-blue" name="btn_signin" value="Sign In">
                            </div>

                            </form>
                            
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
          <script data-cfasync="false" src="../cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script><script src="assets/javascripts/bootstrap.min.js"></script>
                      <script src="assets/javascripts/wow.min.js"></script>
                      <script src="https://maps.googleapis.com/maps/api/js"></script>
                      <script src="assets/javascripts/custom.js"></script>
                      <script src="assets/javascripts/jquery.countTo.js"></script>
                      <script src="assets/javascripts/isotope.pkgd.min.js"></script>
                      <script src="assets/javascripts/slick.min.js"></script>
                      <script src="assets/javascripts/jquery.parallax-1.1.3.js"></script>
                      <script src="assets/javascripts/jquery.appear.min.js"></script>
                      <script src="assets/javascripts/smoothproducts.min.js"></script>
                      <script src="assets/javascripts/custom-map-job-map.js"></script>
                      <script src="assets/javascripts/custom-map-post-a-job.js"></script>
                      <script src="assets/javascripts/custom-map-contact-us.js"></script>
        </body>
      </html>