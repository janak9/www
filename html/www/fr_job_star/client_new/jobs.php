<?php
    if (session_status() == PHP_SESSION_NONE) 
    {
        session_start(); 
    }
if(!isset($_SESSION["key"]))
  {
    header("location:index.php");
  }
    ?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demo.suavedigital.com/jobstar/browse-resumes.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:39 GMT -->
<head>
   <?php include_once("add_once_head.php"); ?>
  </head>

  <body>
<!--     <div class="preloader">
      <div class="image-container">
        <div class="image"><img src="assets/images/preloader.gif" alt=""></div>
      </div>      
    </div> -->
    <div class="container">
      <!-- Navbar Start -->
      <nav class="navbar navbar-inverse navbar-fixed-top navbar-bg-white">
        <div class="container">
            <?php include('candidate_menu.php');?>
    <!-- Banner Grey Starts -->
    <section class="banner-grey">
      <div class="container sec-hq-pad-t sec-hq-pad-b animated wow fadeIn">
        <h2>Browse Resumes</h2>
      </div>
    </section>
    <!-- Banner Grey Ends -->
    <?php
      
    ?>
    <section class="browse-resumes sec-hq-pad-t sec-hq-pad-b">
      <div class="container">
        
        <div class="resume-list-container sec-h-pad-t animated wow fadeIn" data-wow-delay="0.2s">

          <a href="resume_details.php">
            <div class="resume-list valign-wrap">
              <div class="photo-wrap valign-middle content-wrap">
                <div class="photo">
                  <img src="assets/images/individu-2.png" alt="">
                </div>
              </div>
              <div class="name valign-middle content-wrap">
                <h4>Glenn Whelan</h4>
                <p><span>Graphic Designer</span> -  dolor sit amet, consectetur adipiscing elit. Curabitur viverra vulputate tincidunt...</p>
              </div>
              <div class="location valign-middle content-wrap">
                <i class="fa fa-map-marker"></i> &nbsp; Bronx
              </div>
              <div class="job-type fulltime valign-middle content-wrap">
                <div>Photoshop</div>
                <div>3d animation</div>
              </div>
              <div class="exp-salary valign-middle content-wrap">
                <h4>$ 3000 - 4500</h4>
              </div>
            </div><!--/.job-list -->
          </a>


        </div><!--/.job-list-container -->

        <div class="col-md-12 text-center sec-h-pad-t">
          <ul class="pagination">
            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
            <li><a class="active" href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#">7</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
          </ul>
        </div>

      </div>
    </section>

    <!-- Footer Starts -->
    <?php include_once 'footer.php';
    include_once 'add_once_body.php' ; ?>
  </body>

<!-- Mirrored from demo.suavedigital.com/jobstar/browse-resumes.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:39 GMT -->
</html>