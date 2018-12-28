<?php
    if (session_status() == PHP_SESSION_NONE) 
    {
        session_start(); 
    }
if(!isset($_SESSION["c_key"]))
  {
    header("location:index.php");
  }
    ?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demo.suavedigital.com/jobstar/job-alert-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:28:19 GMT -->
<head>
<?php include_once("add_once_head.php"); ?>
  </head>

  <body>
    <!-- <div class="preloader">
      <div class="image-container">
        <div class="image"><img src="assets/images/preloader.gif" alt=""></div>
      </div>      
    </div> -->
    <div class="container">
      <!-- Navbar Start -->
      <nav class="navbar navbar-inverse navbar-fixed-top navbar-bg-white">
        <div class="container">
        
            <?php include('company_menu.php');?>
    <!-- Login Ends -->

    <!-- Register -->
    
    <!-- Banner Grey Starts -->
    <section class="banner-grey">
      <div class="container sec-hq-pad-t sec-hq-pad-b">
        <h2 class="animated wow fadeIn">Job Alerts</h2>
      </div>
    </section>
    <!-- Banner Grey Ends -->

    <section class="job-alert-list sec-pad animated wow fadeIn" data-wow-delay="0.2s">
      <div class="container">
        <div class="table-responsive">
          <table class="large-table">
            <thead>
              <tr>
                <th>Alert Name</th>
                <th>Keywords</th>
                <th>Tags</th>
                <th>Location</th>
                <th>Frequency</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><a href="#">Test Alert</a></td>
                <td>Developer</td>
                <td>Developer</td>
                <td>Bandung</td>
                <td class="frequency">
                  <p>Weekly</p>
                  <p>Next 21 October 2016 at 09.32 AM</p>
                </td>
                <td>
                  <p><a href="#"><i class="fa fa-pencil"></i>Edit</a></p>
                  <p><a href="#"><i class="fa fa-trash"></i>Delete</a></p>
                </td>
              </tr>
              <tr>
                <td><a href="#">Test Alert</a></td>
                <td>Developer</td>
                <td>Developer</td>
                <td>Bandung</td>
                <td class="frequency">
                  <p>Weekly</p>
                  <p>Next 21 October 2016 at 09.32 AM</p>
                </td>
                <td>
                  <p><a href="#"><i class="fa fa-pencil"></i>Edit</a></p>
                  <p><a href="#"><i class="fa fa-trash"></i>Delete</a></p>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="text-center sec-h-pad-t">
          <a href="job_alert_add.php" class="def-btn btn-bg-blue">Add Alert</a>
        </div>
      </div>
    </section>

    <!-- Footer Starts -->
   <?php include_once 'footer.php';?>
    <!-- Footer Ends -->

    <!-- JavaScripts -->
    <script src="assets/javascripts/bootstrap.min.js"></script>
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
    <script src="assets/javascripts/custom-map-contact-us.js">
    </script>
  </body>

<!-- Mirrored from demo.suavedigital.com/jobstar/job-alert-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:28:20 GMT -->
</html>