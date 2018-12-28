<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
$k=$_SESSION['c_key'];
}
if(!isset($_SESSION["c_key"]))
{
header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <!-- Mirrored from demo.suavedigital.com/jobstar/resume-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:39 GMT -->
  <?php
  include_once("connection.php");
  $con = new JobClass;
  ?>
  <head>
    <?php include_once("add_once_head.php"); ?>
  </head>
  <body>
    <!-- <div class="preloader">
      <div class="image-container">
        <div class="image"><img src="assets/images/preloader.gif" alt=""></div>
      </div>
    </div> -->
    <!-- Navbar Start -->
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-bg-white">
      <div class="container">
        <?php include('company_menu.php');?>
        
        
        <!-- Banner Grey Starts -->
        <section class="banner-grey">
          <div class="container sec-hq-pad-t sec-hq-pad-b">
            <h2 class="animated wow fadeIn">Resumes Details</h2>
          </div>
        </section>
        <!-- Banner Grey Ends -->
        <!-- User Profile Starts -->
        <?php $cnd_id= $_GET["cnd_id"];
        $cnd=$con->select_up("candidate_master","cnd_id",$cnd_id);
        $job=$con->select_up("jobtype_master","jtype_id","$cnd[10]");
        $state=$con->select_up("state_master","state_id","$cnd[7]");
        $city=$con->select_up("city_master","city_id","$cnd[8]");
        //print_r($cnd_detail);
        ?>
        <section class="user-profile animated wow fadeIn" data-wow-delay="0.2s">
          <div class="container sec-hq-pad-t sec-h-pad-b">
            <div class="col-md-3 col-sm-3 col-xs-12 content-wrap">
              <div class="user-photo-wrap valign-wrap">
                <img class="user-photo valign-middle" src="../assets/image/cnd_image/<?php echo $cnd[12]; ?>">
                </div><!--/.user-photo-wrap -->
              </div>
              <div class="personal-data col-md-9 col-sm-9">
                <div class="col-md-12 no-l-padding">
                  <div class="col-md-10 col-sm-10 col-xs-10">
                    <h3></h3>
                  </div>
                  <div class="col-md-2 col-sm-2 col-xs-2 edit-profile">
                  </div>
                </div>
                <div class="col-md-12 no-l-padding sec-q-pad-t content">
                  <div class="col-md-6 col-sm-6">
                    <p><h5><i class="fa fa-user"></i><span><?php echo "$cnd[2] $cnd[3]"; ?></span></h5></p>
                    <p><h5><i class="fa fa-neuter"></i><span><?php echo "$cnd[4]"; ?></span></h5></p>
                    <p><h5><i class="fa fa-location-arrow"></i><span><?php echo "$cnd[5]"; ?></span></h5></p>
                    <p><h5><i class="fa fa-map-pin"></i><span><?php echo "$cnd[6]"; ?></span></h5></p>
                    <p><h5><i class="fa fa-map-marker"></i><span><?php echo "$city[2],$state[1]"; ?></span></h5></p>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <p><h5><i class="fa fa-birthday-cake"></i><span><?php echo "$cnd[9]"; ?></span></h5></p>
                    <p><h5><i class="fa fa-clock-o"></i><span><?php echo "$job[1]"; ?></span></h5></p>
                    <p><h5><i class="fa fa-money"></i><span><?php echo "$cnd[11]"; ?></span></h5></p>
                    <p><i class="fa fa-envelope"></i><a href="http://demo.suavedigital.com/cdn-cgi/l/email-protection"  data-cfemail="fa9995948e9b998eba83958f88979b9396d4999597"> [<?php echo $cnd[13]; ?>&#160;protected]</a></p>
                  </div>
                </div>
                
                </div><!--/.personal-data -->
                </div><!--/.container -->
                <?php
                $cnd_id= $_GET["cnd_id"];
                $education=$con->select_up("education_master","cnd_id",$cnd_id);
                $experience=$con->select_up("experience_master","cnd_id",$cnd_id);
                $cnd=$con->select_up("company_master","cmp_id",$experience[3]);
                ?>
                <div class="education-timeline sec-q-pad-t sec-q-pad-b">
                  <div class="container timeline-container">
                    <div class="col-md-3 col-sm-3">
                      <div class="title-underlined">
                        <h3>Education</h3>
                      </div>
                    </div>
                    <div class="col-md-9 col-sm-9">
                      <ul class="timeline">
                        <li>
                          <div class="timeline-icon">
                            <i class="fa fa-graduation-cap"></i>
                          </div>
                          <div class="timeline-label">
                            <div class="year">
                              <h4><?php echo "$education[8] - $education[9]"; ?></h4>
                            </div>
                            <div class="desc content">
                              <h4><span><?php echo "$education[2]"; ?></span></h4>
                              <h4><?php echo "$education[3]"; ?></h4>
                              <h4><i class="fa fa-map-marker"></i>  <span><?php echo "$state[1] , $city[2]"; ?></span></h4>
                              <p><?php echo "$education[11]"; ?></p>
                            </div>
                          </div>
                        </li>
                        
                      </ul>
                    </div>
                  </div>
                  </div><!--/.education-timeline -->
                  <?php
                  $cnd_id= $_GET["cnd_id"];
                  $education=$con->select_up("education_master","cnd_id",$cnd_id);
                  $experience=$con->select_up("experience_master","cnd_id",$cnd_id);
                  $cmp=$con->select_up("company_master","cmp_id",$experience[3]);
                  if(isset($experience))
                  {
                  ?>
                  <div class="work-exp-timeline sec-q-pad-t sec-q-pad-b">
                    <div class="container timeline-container">
                      <div class="col-md-3 col-sm-3">
                        <div class="title-underlined">
                          <h3>Work Experience</h3>
                        </div>
                      </div>
                      <div class="col-md-9 col-sm-9">
                        <ul class="timeline">
                          <li>
                            <div class="timeline-icon">
                              <i class="fa fa-briefcase"></i>
                            </div>
                            <div class="timeline-label">
                              <div class="year">
                                <h4><?php echo "$experience[6] Experience"; ?></h4>
                              </div>
                              <div class="desc content">
                                <h4><span><?php echo "$experience[2]"; ?></span></h4>
                                <h4><?php echo "$experience[3]"; ?></h4>
                                <h4>  <span><?php echo "$cmp[2]"; ?></span></h4>
                                <p><i class="fa fa-map-marker"></i><?php echo "$city[2] , $state[1]"; ?></p>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    </div><!--/.work-exp-timeline -->
                    <?php  } ?>
                    </section><!--/.user-profile -->
                    <!-- User Profile Ends -->
                    <!-- Footer Starts -->
                    <?php include_once 'footer.php';?>
                    <!-- Footer Ends -->
                    <!-- JavaScripts -->
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
                    <script src="assets/javascripts/custom-map-contact-us.js">
                    </script>
                  </body>
                  <!-- Mirrored from demo.suavedigital.com/jobstar/resume-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:41 GMT -->
                </html>