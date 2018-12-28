<?php
    if (session_status() == PHP_SESSION_NONE) 
    {
        session_start(); 
    }
/*if(!isset($_SESSION["c_key"]))
  {
    header("location:index.php");
  }*/
  //include_once("connection.php");
 // $con = new JobClass;

 ?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demo.suavedigital.com/jobstar/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:29:10 GMT -->
<head>
   <?php include_once("add_once_head.php"); ?>
  </head>

  <body>
      <!-- Navbar Start -->
      <nav class="navbar navbar-inverse navbar-fixed-top navbar-bg-white">
        <div class="container">
         <?php
          if(isset($_SESSION["c_key"]))
          {
            include_once("connection.php");
            $con = new JobClass;
            include('company_menu.php');
          }
          elseif(isset($_SESSION["key"])) 
          {
            include_once("connection.php");
            $con = new JobClass;
            include('candidate_menu.php');
          }
          else
          {
            include('menu.php'); 
          }
       ?>
         
    <!-- Navbar Ends -->

    <!-- Login Modal -->
   
    <!-- Banner Grey Starts -->
    <section class="banner-grey">
      <div class="container sec-hq-pad-t sec-hq-pad-b animated wow fadeIn">
        <h2>Contact Us</h2>
         <?php
          if(isset($_POST['submit']))
          {
            $data["name"]=$_POST["cnt_name"];
            $data["cnt_number"]=$_POST["cnt_number"];
            $data["email_id"]=$_POST["email_id"];
            $data["message"]=$_POST["message"];
           // print_r($data);
            $con->insertion("contact",$data);
          }
          
          ?>
         
      </div>
    </section>


    <!-- Banner Grey Ends -->

    <!-- Contact Us Starts -->
    <section class="contact-us animated wow fadeIn" data-wow-delay="0.2s">
      <div class="container">
        <div class="col-md-12">
          <div class="map-canvas" id="map-canvas-contact-us"></div>
        </div>

        <div class="sec-h-pad-t sec-h-pad-b content col-md-12">
          <div class="col-md-8 col-sm-8 contact-us-form">
            <div class="title-underlined">
              <h3>Contact Us</h3>
                      </div>

            <form action="#" class="form-horizontal" method="post">
              <div class="form-group">
                <div class="col-md-6 col-sm-6">
                  <input type="text" class="def-input" placeholder="Name" name="cnt_name">
                </div>
                <div class="col-md-6 col-sm-6">
                  <input type="email" class="def-input" placeholder="E-mail" name="email_id">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <input type="number" class="def-input" placeholder="Phone Number" name="cnt_number">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <textarea name="message" id="" class="def-input" placeholder="message"></textarea>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12 text-right mar-20-t">
                  <input type="submit" name="submit" class="def-btn btn-bg-blue" value="submit">
                </div>
              </div>
            </form>
          </div>

          <div class="col-md-4 col-sm-4">
            <div class="text-content">
              <p>We are ready to serve you very well, be free to contact us anytime!</p><br>
              <p>We also encourage you to check our <a href="faq.html"> frequently asked questions (FAQ)</a>. This list of commonly-asked questions and answers could be just what you need to find a quick answer to your question.</p><br>

              <p>Beverly Hills, CA 90213-0900</p>
              <p>United States</p><br>

              <p><i class="fa fa-phone"></i> &nbsp; +(1) 627  374 114</p>
              <p><i class="fa fa-envelope"></i> &nbsp; <a href="http://demo.suavedigital.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bdded2d3c9dcdec9fdd7d2dfcec9dccf93ded2d0">[email&#160;protected]</a></p>
              <p><i class="fa fa-globe"></i> &nbsp; http://jobstar.com</p>
            </div>
          </div>
        </div>

      </div>
    </section>
    <!-- Contact Us Ends -->

    <!-- Footer Starts -->
   <?php include('footer.php');?>
    <!-- Footer Ends -->

    <!-- JavaScripts -->
    <script data-cfasync="false" src="../cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script><script src="assets/javascripts/bootstrap.min.js"></script>
    <script src="assets/javascripts/wow.min.js"></script>
    <script src="assets/javascripts/custom.js"></script>
    <script src="assets/javascripts/jquery.countTo.js"></script>
    <script src="assets/javascripts/isotope.pkgd.min.js"></script>
    <script src="assets/javascripts/slick.min.js"></script>
    <script src="assets/javascripts/jquery.parallax-1.1.3.js"></script>
    <script src="assets/javascripts/jquery.appear.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJEWOkg4njiqY71jR-xxs-PnQI9yXaYsQ"></script>
    <script src="assets/javascripts/smoothproducts.min.js"></script>
    <script src="assets/javascripts/custom-map-job-map.js"></script>
    <script src="assets/javascripts/custom-map-post-a-job.js"></script>
    <script src="assets/javascripts/custom-map-contact-us.js">
    </script>
  </body>

<!-- Mirrored from demo.suavedigital.com/jobstar/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:29:10 GMT -->
</html>