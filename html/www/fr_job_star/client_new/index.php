<?php 
if (session_status() == PHP_SESSION_NONE) 
    {
        session_start(); 
        $page="home";
    }
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
<?php 
  include_once("add_once_head.php"); 
  ?>
  </style>
</head>
  <body>
    
      <!-- Navbar Start -->
      <nav class="navbar navbar-inverse navbar-fixed-top">
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
                    <h1>Your skills are in demand</h1>
                  </div>
                  <div class="banner-description animated fadeInUp wow" data-wow-delay="1.7"">
                   Stay up to date with all of the newest job opportunities available<br>
                      Be the first to apply to your dream job in your desired location<br>
                     Get jobs posted across thousands of websites delivered straight to your inbox<br>
                      Create multiple job alerts and manage them easily with your jobstar account<br>
                  </div>
                  <div class="button-wrap animated fadeInUp wow" data-wow-delay="2.2">
                    <?php if(isset($_SESSION['key'])) { ?>
                    <a href="job_search2.php" class="def-btn btn-bg-blue">Find a Job</a>
                    <?php } elseif (isset($_SESSION['c_key'])) {   ?>
                    <a href="post_a_job.php" class="def-btn btn-bg-yellow">Post a Job</a>
                    <?php } else {?>
                    <a href="job_search2.php" class="def-btn btn-bg-blue">Find a Job</a>
                    <a onclick="<?php if (!isset($_SESSION['c_key'])) { ?>alert('First You Have To Login As Company'); <?php }?>" href="post_a_job.php" class="def-btn btn-bg-yellow" >Post a Job</a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div> <!--/ Content Wrap -->
          </div> <!--/ Container -->
        </div> <!--/ Item -->

        <div class="item" style="background:url(assets/images/banner-3.jpg); background-size:cover; background-attachment: fixed;">
          <div class="overlay"></div>
          <div class="container">
            <div class="content-wrap valign-wrap">
              <div class="content valign-middle">
                <div class="text-content col-md-8 col-md-offset-2 col-xs-12">
                  <div class="heading animated fadeInUp wow" data-wow-delay="0.7">
                    <h1>Your next hire is here.</h1>
                  </div>
                  <div class="banner-description animated fadeInUp wow" data-wow-delay="1.7">
                    <h4>jobstar helps millions of job candidate and company find the right fit every day. Start hiring now on the world's #1 job site.</h4>
                  </div>
                   <div class="button-wrap animated fadeInUp wow" data-wow-delay="2.2">
                    <?php if(isset($_SESSION['key'])) { ?>
                    <a href="job_search2.php" class="def-btn btn-bg-blue">Find a Job</a>
                    <?php } elseif (isset($_SESSION['c_key'])) {   ?>
                    <a href="post_a_job.php" class="def-btn btn-bg-yellow">Post a Job</a>
                    <?php } else {?>
                    <a href="job_search2.php" class="def-btn btn-bg-blue">Find a Job</a>
                    <a onclick="<?php if (!isset($_SESSION['c_key'])) { ?>alert('First You Have Login As Company'); <?php }?>" href="post_a_job.php" class="def-btn btn-bg-yellow" >Post a Job</a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div> <!--/ Content Wrap -->
          </div> <!--/ Container -->
        </div> <!--/ Item -->

        

      </div> <!--/ Carousel Inner -->

      <!-- Controls -->
      <a class="left carousel-control" href="#banner-carousel" role="button" data-slide="prev">
        <div class="control left">
          <div class="shape"><i class="fa fa-angle-left"></i></div>
        </div>
      </a>
      <a class="right carousel-control" href="#banner-carousel" role="button" data-slide="next">
        <div class="control right">
          <div class="shape"><i class="fa fa-angle-right"></i></div>
        </div>
      </a>

    </section><!--/.banner-input-resume -->
    <!-- Banner 2 Cols Ends -->
    <br>
    <section class="job-counter">
      <div class="container">
        <div class="counter-wrap sec-pad col-md-12 col-sm-12 col-xs-12">
          <div class="counter-column col-md-3 col-sm-3 text-center animated wow fadeIn" data-wow-delay="0.3s">
            <div class="icon"><i class="pe-7s-rocket pe-2x"></i></div>
            <div class="separator"></div>
            <div class="counter-number" data-to="<?php $count=$con->counter("company_master","cmp_id"); 
              echo $count; ?>" data-speed="3000" data-from="0"></div>
            <div class="bottom-text">Companies</div>
          </div><!--/.counter-column -->
          <!-- <div class="counter-column col-md-3 col-sm-3 text-center animated wow fadeIn" data-wow-delay="0.5s">
            <div class="icon"><i class="pe-7s-coffee pe-2x"></i></div>
            <div class="separator"></div>
            <div class="counter-number" data-to="300" data-speed="3000" data-from="0"></div>
            <div class="bottom-text">Freelance Jobs</div>
          </div> --><!--/.counter-column -->
          <div class="counter-column col-md-3 col-sm-3 text-center animated wow fadeIn" data-wow-delay="0.7s">
            <div class="icon"><i class="pe-7s-clock pe-2x"></i></div>
            <div class="separator"></div>
            <div class="counter-number" data-to="<?php $count2=$con->counter(" jobpost_master","j_id"); 
              echo $count2; ?>" data-speed="3000" data-from="0"></div>
            <div class="bottom-text">Jobs</div>
          </div><!--/.counter-column -->
          <div class="counter-column col-md-3 col-sm-3 text-center animated wow fadeIn" data-wow-delay="0.9s">
            <div class="icon"><i class="pe-7s-users pe-2x"></i></div>
            <div class="separator"></div>
            <div class="counter-number" data-to="<?php $count1=$con->counter("candidate_master","cnd_id"); 
              echo $count1; ?>" data-speed="3000" data-from="0"></div>
            <div class="bottom-text">Members</div>
          </div><!--/.counter-column -->
          <div class="counter-column col-md-3 col-sm-3 text-center animated wow fadeIn" data-wow-delay="0.5s">
            <div class="icon"><i class="pe-7s-coffee pe-2x"></i></div>
            <div class="separator"></div>
            <div class="counter-number" data-to="300" data-speed="3000" data-from="0"></div>
            <div class="bottom-text">visiters</div>
          </div><!--/.counter-column -->
        </div>
      </div>
    </section><!--/.job-counter-->
    
    <!-- Job Info Starts -->
    <section class="job-info-1">
      <div class="container sec-pad">
        <div class="recent-job-1 col-md-8">
        <h2 class="animated wow fadeIn" data-wow-delay="0.1s">Recent Job</h2>
          <div class="job-filter-1 animated wow fadeIn" data-wow-delay="0.2s">
          <a href="javascript:void(0)" data-filter="*" class="current">All</a> / 
            <?php
              $jtype=$con->data_dd("jobtype_master");
              while($row_type=mysqli_fetch_array($jtype))
              {
                $sub=$row_type['jtype_name'];
                $jtype_res=str_replace(" ", "_", $sub);
                ?>
                  <a href="javascript:void(0)" data-filter=".<?php echo $jtype_res; ?>" class=""><?php echo $row_type['jtype_name']; ?></a> / 
                <?php
              }
            ?>
          </div><!--/.job-filter-1-->

          <div class="job-content-1 animated wow fadeIn" data-wow-delay="0.2s">
            <?php  
            $i=1;
              $jobpost=$con->data_dd("jobpost_master");
              while($jobpost_row=mysqli_fetch_array($jobpost))
              {
                $jobtype_id=$jobpost_row['jobtype_id'];
                $job_type=$con->select_up("jobtype_master","jtype_id",$jobtype_id);
                $cmp_id=$jobpost_row['cmp_id'];
                $cmp=$con->select_up("company_master","cmp_id",$cmp_id);
                $subject1=$job_type['jtype_name'];
                $jtype_res1=str_replace(" ", "_", $subject1);
                $subrid=$jobpost_row['subr_id'];
                $subrole=$con->select_up("subrole_master","subr_id",$subrid);
                $state=$con->select_up("state_master","state_id",$jobpost_row['state_id']);
                $city=$con->select_up("city_master","city_id",$jobpost_row['city_id']);
                if($i<=6)
                {
            ?>
            <a href="job_details.php?cid=<?php echo $jobpost_row[1];?>&jid=<?php echo $jobpost_row[0] ;?>" class="<?php echo $jtype_res1; ?>">
              <div class="job-list valign-wrap">
                <div class="company-icon valign-middle">
                  <img src="<?php echo '../assets/image/cmp_logo/'.$cmp[15];?>" height="50px">
                </div>
                <div class="separator"></div>
                <div class="company valign-middle">
                  <div class="company-name">
                    <div class="col-md-6 col-sm-6 name"><?php echo $cmp['cmp_name']; ?></div>
                    <div class="col-md-4 col-sm-4 text-center"><span>full time</span></div>
                  </div>
                  <div class="company-info">
                    <div class="col-md-4 col-sm-4 row">
                      <i class="fa fa-briefcase"></i>&nbsp; <?php echo $jobpost_row['j_name']; ?>
                    </div>
                    <div class="col-md-4 col-sm-4">
                      <i class="fa fa-compass"></i>&nbsp; <?php echo "$state[1], $city[2]"; ?>
                    </div>
                    <div class="col-md-4 col-sm-4">
                      <i class="fa fa-money">&nbsp; <?php echo "$jobpost_row[6] - $jobpost_row[7]"; ?></i>
                    </div>
                  </div>
                </div>
              </div><!--/.job-list-->
            </a>
            <?php 
            $i++;
          }
        }
            ?>
          </div><!--/ Job Content -->

          <div class="sec-h-pad-t"></div>

          <a href="job_search2.php" class="def-btn btn-bg-blue">Load More</a>

        </div><!--/.recent-job-1 -->

        <!-- Job Spotlight -->
        <div class="job-spotlight col-md-4">
          <h2 class="animated wow fadeIn" data-wow-delay="0.2s">Job Spotlight</h2>

          <!-- Carousel -->
          <div class="content carousel slide animated wow fadeIn" data-wow-delay="0.5s" id="carousel-job-spotlight" data-ride="carousel">

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-job-spotlight" role="button" data-slide="prev">
              <div class="control-button left"><i class="fa fa-angle-left"></i></div>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-job-spotlight" role="button" data-slide="next">
              <div class="control-button right"><i class="fa fa-angle-right"></i></div>
              <span class="sr-only">Next</span>
            </a>
            

            <div class="carousel-inner" role="listbox">
              <?php
              $job_post=$con->data_dd("jobpost_master");
              
              while($job_row=mysqli_fetch_array($job_post))
              {
                $job_type_id=$job_row['jobtype_id'];
                $jobtype=$con->select_up("jobtype_master","jtype_id",$job_type_id);
                $subrid1=$job_row['subr_id'];
                $subrole1=$con->select_up("subrole_master","subr_id",$subrid1);
                
                if($job_row[0]==1)
                {
                  $class="item active";
                }
                else
                {
                  $class="item";
                }
                $cmpid=$job_row['cmp_id'];
                $cmp_data=$con->select_up("company_master","cmp_id",$cmpid);
                ?>
              <div class="<?php echo $class; ?>">
                <div class="content-wrap ">
                  <div class="company-logo valign-wrap">
                    <div class="valign-middle">
                      <img src="<?php echo '../assets/image/cmp_logo/'.$cmp_data[15];?>" height="100px">
                    </div>
                  </div>
                  <div class="company-info freelance">
                    <div class="job-type"><span><?php echo $jobtype['jtype_name']; ?></span></div>
                    <div class="job-position"><?php echo $job_row['j_name']; ?></div>
                    <div class="job-description"><?php echo $job_row['des']; ?></div>
                      <div class="release-date"><?php echo $job_row['updated_date']; ?></div>
                     <a href="job_details.php?cid=<?php echo $job_row[1];?>&jid=<?php echo $job_row[0] ;?>" class="read-more"><div class="text">Read More</div><div class="right-arrow"><i class="fa fa-angle-right"></i></div></a>
                  </div>
                </div>
              </div>
              <!--/.item -->
              <?php } ?>

            </div><!--/.carousel-inner -->
            
          </div><!--/.carousel -->
          
        </div><!--/.job-spotlight -->
      </div><!--/.container -->
    </section><!--/.job-info-1 -->
    <!-- Job Info 1 Ends -->

    <!-- Testimonials 3 Starts -->
   <?php include_once 'testimonial.php'; ?>
    <!-- Testimonial 3 Ends -->

    <!-- Client Logos Starts -->
    <!-- Client Logos Ends --><!-- Footer Starts -->
   <?php include_once 'footer.php';
        /*include_once 'add_once_body.php' ;*/
   ?>
    <!-- Footer Ends -->
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
    <!-- JavaScripts -->
    
  </body>

<!-- Mirrored from demo.suavedigital.com/jobstar/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:26:45 GMT -->
</html>