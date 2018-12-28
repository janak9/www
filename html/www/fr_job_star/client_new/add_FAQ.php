<?php
ob_start();
if (session_status() == PHP_SESSION_NONE)
{
session_start();
$k=@$_SESSION["key"];
}
if(!isset($_SESSION["key"]))
{
  echo "<script>alert('Login Is Required'); window.location.href='index.php';</script>";
}
// $con=mysqli_connect("localhost","root","","job180") or die(mysql_error());
// $k=$_SESSION['c_key'];
include_once("connection.php");
$con = new JobClass;
if(isset($_POST['submit']))
{
  $k=$_SESSION['key'];
  $row=$con->select_up("candidate_master","serial_key","$k");
  $data["cnd_id"]=$row[0];
  $data["sub"]=$_POST["sub"];
  $data["des"]=$_POST["des"];
  $data["ans"]=NULL;
  $s=$con->insertion('faq',$data); 
  if ($s) {
    echo "<script>alert('Thank You.Your Ans Will Also Send To Your Email.');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <!-- Mirrored from demo.suavedigital.com/jobstar/create-resume.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:41 GMT -->
  <head>

    <?php include_once("add_once_head.php"); ?>
    <style type="text/css">
    .erText{
    font-family: Arial;
    font-size: 15px;
    color:#cc0000;
    text-decoration: none;
    font-weight: normal;
    }
    </style>
  </head>
  <body>
    <div class="container">
      <!-- Navbar Start -->
      <nav class="navbar navbar-inverse navbar-fixed-top navbar-bg-white">
        <div class="container">
          <?php include('candidate_menu.php');?>
          
          <!-- Banner Grey Starts -->
          <section class="banner-grey">
            <div class="container sec-hq-pad-t sec-hq-pad-b">
              <h2 class="animated wow fadeIn">Any Question?</h2>
            </div>
          </section>
          <section class="resume-form sec-hq-pad-t sec-hq-pad-b animated wow fadeIn" data-wow-delay="0.2s">
            <div class="form-content">
              <div class="container">
                <?php
                $k=$_SESSION['key'];
                $row=$con->select_up("candidate_master","serial_key","$k");
                ?>
                <form action="#" class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="col-md-9 col-sm-9">
                    <div class="form-group">
                      <div class="col-md-12">
                        <strong>Subject</strong>
                      </div>
                      <div class="col-md-12">
                        <input class="def-input" placeholder="Enter Subject" name="sub" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <strong>Description</strong>
                      </div>
                      <div class="col-md-12">
                        <textarea class="def-input" placeholder="Enter Your Experience" name="des" rows="2" id="des" required></textarea>
                      </div>
                    </div>
                    <div class="col-md-12 sec-h-pad-t text-right">
                      <input type="submit" name="submit" class="def-btn btn-bg-blue" value="Finish">
                    </div>
                    </form>
                <div class="education col-md-6 col-sm-6 sec-hq-pad-t content-wrap">
                <div class="form-header">
                  <h4>Releted Question.</h4>
                </div>
                <?php $faq=$con->select_mul("faq","ans!","''");
                while($faq_row=mysqli_fetch_array($faq))
                {
                ?>
                <b>Subject :<?php echo $faq_row[2];?></b>
                <p>Description :<?php echo $faq_row[3];?></p>
                <strong>Ans:<?php echo $faq_row[4];?></strong><br><br>
                <?php }?>
              </div>    
              </div><!--/.container -->
            </div><!--/.form-content -->
          </section>
                  <?php include_once 'footer.php';  ?>
                  <?php include_once 'add_once_body.php';  ?>
                </body>
              </html>