<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demo.suavedigital.com/jobstar/job-alert-add.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:33:31 GMT -->
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
            <?php include('menu.php');?>
    <!-- Login Ends -->

    <!-- Register -->
    
    <!-- Banner Grey Starts -->
    <section class="banner-grey">
      <div class="container sec-hq-pad-t sec-hq-pad-b">
        <h2 class="animated wow fadeIn">Job Alerts</h2>
      </div>
    </section>
    <!-- Banner Grey Ends -->

    <section class="job-alert-add sec-pad animated wow fadeIn" data-wow-delay="0.2s">
      <div class="container">
        <form class="form-horizontal">
          <div class="col-md-12">
            <div class="form-group">
              <div class="col-md-3 col-sm-3">
                <h4>Alert Name</h4>
              </div>
              <div class="col-md-9 col-sm-9">
                <input type="text" class="def-input" placeholder="Short title for your job">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-3 col-sm-3">
                <h4>Keyword</h4>
              </div>
              <div class="col-md-9 col-sm-9">
                <input type="text" class="def-input" placeholder="Job keywords">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-3 col-sm-3">
                <h4>Tags</h4>
              </div>
              <div class="col-md-9 col-sm-9">
                <input type="text" class="def-input" placeholder="Jobs Tags">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-3 col-sm-3">
                <h4>Location</h4>
              </div>
              <div class="col-md-9 col-sm-9">
                <input type="text" class="def-input" placeholder="Choose location you want to work">
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-3 col-sm-3">
              <h4>Job Type</h4>
              </div>
              <div class="col-md-9 col-sm-9">
                <select class="def-input def-select">
                  <option value="" selected disabled>Choose Type</option>
                  <option value="fulltime">Full Time</option>
                  <option value="parttime">Part Time</option>
                  <option value="freelance">Freelance</option>
                  <option value="internship">Internship</option>
                  <option value="temporary">Temporary</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-3 col-sm-3">
              <h4>Email frequency</h4>
              </div>
              <div class="col-md-9 col-sm-9">
                <select class="def-input def-select">
                  <option value="" selected disabled>Choose Type</option>
                  <option value="Daily">Daily</option>
                  <option value="Weekly">Weekly</option>
                  <option value="Monthly">Monthly</option>
                </select>
              </div>
            </div>
            <div class="text-center sec-q-pad-t">
              <a href="#" class="def-btn btn-bg-blue">Add Alert</a>
            </div>
          </div>
        </form>
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

<!-- Mirrored from demo.suavedigital.com/jobstar/job-alert-add.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:33:31 GMT -->
</html>