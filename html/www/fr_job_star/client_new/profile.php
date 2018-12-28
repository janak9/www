<!DOCTYPE html>
<html lang="en">
  
  <?php if (session_status() == PHP_SESSION_NONE)
  {
    session_start();
    $k=$_SESSION["c_key"];
  }
  if(!isset($_SESSION["c_key"]))
  {
    header("location:index.php");
  }
  ?>
    <?php 
    include("connection.php");
    $con = new JobClass;
    
if(isset($_GET['jid']))
{
  $jid=$_GET['jid'];
  $con->deletion("jobpost_master","j_id",$jid);
  $con->deletion("apply_master","j_id",$jid);
  header("location:profile.php");
}
    ?>
  <!-- Mirrored from demo.suavedigital.com/jobstar/resume-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:39 GMT -->
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
          
          <?php include('company_menu.php');
          $k=$_SESSION['c_key'];
              $row=$con->select_up("company_master","serial_key","$k");
              $add=$row['address'];
              if($add=="")
              { ?>
                <script>
                alert('Firest Create Your Profile'); 
                window.location.href="index.php";
               </script>
            <?php   
             } 
          ?>
           <!-- Banner Grey Starts -->
          <section class="banner-grey">
            <div class="container sec-hq-pad-t sec-hq-pad-b">
              <h2 class="animated wow fadeIn">Profile Details</h2>
            </div>
          </section>
          <!-- Banner Grey Ends -->
          <!-- User Profile Starts -->
          <section class="user-profile animated wow fadeIn" data-wow-delay="0.2s">
            <div class="container sec-hq-pad-t sec-h-pad-b">
              <?php
              //echo $_SESSION['c_key'];
              $k=$_SESSION['c_key'];
              $row=$con->select_up("company_master","serial_key","$k");
              //print_r($row);
              ?>
              <div class="col-md-3 col-sm-3 col-xs-12 content-wrap">
                <div class="user-photo-wrap valign-wrap">
                  <img class="user-photo valign-middle" src="../assets/image/cmp_logo/<?php echo $row[15]; ?>">
                  </div><!--/.user-photo-wrap -->
                </div>
                <div class="personal-data col-md-9 col-sm-9">
                  <div class="col-md-12 no-l-padding">
                    <div class="col-md-10 col-sm-10 col-xs-10">
                      <h3><?php echo $row[2]; ?></h3>
                    </div>
                    <div class="col-md-2 col-sm-2 col-xs-2 edit-profile">
                    </div>
                  </div>
                  <div class="col-md-12 no-l-padding sec-q-pad-t content">
                    <div class="col-md-6 col-sm-6">
                      <p><i class="fa fa-briefcase"></i><b> Company Employee :</b> <?php echo $row[3]; ?> </p>
                      <p><i class="fa fa-briefcase"></i ><b> GST Numbetr :</b> <?php echo $row[4]; ?> </p>
                      <p><i class="fa fa-phone"></i><b>&nbsp; Company Phone Number :</b> <?php echo $row[5]; ?> </p>
                      <p><i class="fa fa-info-circle"></i><b>&nbsp; Company Website :</b> <?php echo $row[6]; ?> </p>
                      <?php
                      $r=$con->select_up("role_master","r_id","$row[7]");
                      $sr=$con->select_up("subrole_master","subr_id","$row[8]");
                      ?>
                      <p><i class="fa fa-map-marker"></i><b>&nbsp;&nbsp; Address :</b> <?php echo $row[9]; ?> </p>
                      <p><i class="fa fa-map-pin"></i><b>&nbsp;&nbsp; Pincode :</b> <?php echo $row[10]; ?> </p>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <?php
                      $st=$con->select_up("state_master","state_id","$row[11]");
                      $ct=$con->select_up("city_master","city_id","$row[12]");
                      ?>
                      <p><i class="fa fa-map-marker"></i><b>&nbsp;&nbsp; State :</b> <?php echo $st[1]; ?> </p>
                      <p><i class="fa fa-map-marker"></i><b>&nbsp;&nbsp; City :</b> <?php echo $ct[2]; ?> </p>
                      <p><i class="fa fa-briefcase"></i><b> Owner Name :</b> <?php echo $row[13]; ?> </p>
                      <p><i class="fa fa-envelope"></i><b> Owner Email :</b><a href="http://demo.suavedigital.com/cdn-cgi/l/email-protection"  data-cfemail="fa9995948e9b998eba83958f88979b9396d4999597"> [<?php echo $row[14]; ?>&#160;protected]</a></p>
                      <p><i class="fa fa-envelope"></i><b> Email Id :</b> <a href="http://demo.suavedigital.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="fa9995948e9b998eba83958f88979b9396d4999597"> [<?php echo $row[16]; ?>&#160;protected]</a></p>
                      
                    </div>
                  </div>
                    </div><!--/.personal-data -->
                    </div><!--/.container -->
                    <?php
                    $k=$_SESSION['c_key'];
                    $row=$con->select_up("company_master","serial_key","$k");
                    ?>
                    <div class="education-timeline sec-q-pad-t sec-q-pad-b">
                      <div class="container timeline-container">
                        <div class="col-md-3 col-sm-3">
                          <div class="title-underlined">
                            <h3>Job Post</h3>
                          </div>
                        </div>
                        <div class="col-md-9 col-sm-9">
                          <ul class="timeline">
                            <?php
                              $result_select=$con->select_mul("jobpost_master","cmp_id","$row[0]");
                              while($job_row=mysqli_fetch_array($result_select))
                              {
                                $jid=$job_row[0];
                                $cd= $job_row[15];
                                $cdate=date_create("$cd");
                                $ud= $job_row[16];
                                $udate=date_create("$ud");
                                $cmp=$con->select_up("company_master","cmp_id","$job_row[1]");
                                $job=$con->select_up("jobtype_master","jtype_id","$job_row[2]");
                                $skill=$con->select_up("role_master","r_id","$job_row[4]");
                                $subrole=$con->select_up("subrole_master","subr_id","$job_row[5]");
                                $state=$con->select_up("state_master","state_id","$job_row[10]");
                                $city=$con->select_up("city_master","city_id","$job_row[11]");
                                ?>
                              <li>
                              <div class="timeline-icon">
                                <i class="fa fa-graduation-cap"></i>
                              </div>
                              <div class="timeline-label">
                                <div class="year">
                                  <h4><?php echo date_format($cdate,"d M Y"); ?></h4>
                                </div>
                                <div class="desc content">
                                  <h4><?php echo $job_row[3]; ?> : <span><?php echo $skill[1]; ?></span> :- <span><?php echo $subrole[2]; ?></span></h4>
                                  <h5><i class="fa fa-clock-o"></i> : <span><?php echo $job[1]; ?></span></h5>
                                  <h5><i class="fa fa-money"></i> : <span><?php echo "$job_row[6] - $job_row[7]"; ?></span></h5>
                                  <h5><b style="color: #fcc513"><?php echo "company Name"; ?></b> : <span><?php echo $cmp[2]; ?></span></h5>
                                  <h5><b style="color: #fcc513"><?php echo "experience"; ?></b> : <span><?php echo "$job_row[8] year to $job_row[9] year"; ?></span></h5>
                                  <h5><i class="fa fa-map-marker"></i> : <span><?php echo "$state[1],$city[2]"; ?></span></h5>
                                  <p><?php echo $job_row[12]; ?></p>
                                  <h5 style="text-align: right;"><?php echo "updated date"; ?> : <span><?php echo date_format($udate,"d M Y"); ?></span></h5>
                                  <a href="profile.php?jid=<?php echo $jid; ?>" style="text-align: right;" onClick="return confirm('Are you sure to delete??');" class="def-btn btn-bg-blue">Delete</a>
                                </div>
                              </div>
                            </li>
                            <?php
                              }
                            ?>
                          </ul>
                        </div>
                      </div>
                      </div><!--/.work-exp-timeline -->
                      
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