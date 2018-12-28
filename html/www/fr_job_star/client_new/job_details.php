<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}
$connection = mysqli_connect("localhost","root","","job180") or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demo.suavedigital.com/jobstar/job-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:41 GMT -->
<head>
<?php include_once("add_once_head.php");?>
  </head>

  <body>
      <!-- Navbar Start -->
      <nav class="navbar navbar-inverse navbar-fixed-top navbar-bg-white">
        <div class="container">
        <?php 
        $chat="active";
        $chat_cmp_id=$_GET['cid'];
        if(isset($_SESSION['key']))
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
    <?php
    
    $id= $_GET['cid'];
    $row=$con->select_up("company_master","cmp_id",$id);
//    print_r($row)
    ?>
    <!-- Job Details Starts -->
    <section class="job-details">
      <div class="job-banner sec-h-pad">
        <div class="container animated wow fadeIn">
          <div class="resume-list valign-wrap">
              <div class="photo-wrap valign-middle content-wrap">
                  <div class="photo">
                      <img src="../assets/image/cmp_logo/<?php echo $row[15]; ?>" style="border-radius: 50%; height: 70px;">
                    </div>
                  </div>
                  &nbsp;&nbsp;&nbsp;
                </div>  
          <div class="valign-middle title-job">
            <h2><?php echo "$row[2]"; ?>
            </h2>
            <?php
            $jid=$_GET['jid'];
    $row1=$con->select_up("jobpost_master","j_id",$jid);
    $row2=$con->select_up("jobtype_master","jtype_id",$row1[2]);
    $row3=$con->select_up("role_master","r_id",$row1[7]);
    if(isset($_SESSION['key']))
        {
          $k=$_SESSION['key'];
    $cnd=$con->select_up("candidate_master","serial_key",$k);
  }

    //print_r($row1);

            ?>
            <div class="job-type fulltime"><?php echo $row2[1];?></div>
            <div class="posted-on"><i class="fa fa-clock-o"></i> &nbsp; Posted on <?php echo $row1[16];?></div>
          </div>
          <?php  
           if(!isset($_SESSION['key']))
           {
              $href="login.php?cmpid=$id&jid=$jid";
           }
           else
           {
            $href="check_resume.php?cmpid=$id&jid=$jid";
           }
        
          ?>
          <div class="buttons valign-top">
            <?php 
            
            if(isset($_GET['a'])) 
            { 
              echo "Applied For This Job"; 
            } 
            else 
            {
              if(isset($_SESSION['key']))
              {
                $jid=$_GET['jid'];
                 $ap_sql="select * from apply_master where cmp_id=$row[0] and cnd_id=$cnd[0] and j_id= $jid";
                $ap_res=mysqli_query($connection,$ap_sql);
                $ap_row=mysqli_fetch_array($ap_res);
                 if(isset($ap_row['ap_id']))
                  {
                     echo "Already Applied For This Job";   
                  }
                  else
                 {
                  ?>
                    <a href=<?php echo $href ?> class="def-btn btn-bg-blue">apply for this job</a> 
                <?php
                  }
              }
              else
              {
              ?>
                <a href=<?php echo $href ?> class="def-btn btn-bg-blue">apply for this job</a>
              <?php
              }
            } 
           ?>
            <!--a href="#" class="def-btn btn-bg-yellow">apply via LinkedIn</a>
            <a href="#" class="def-btn btn-bg-blue">apply via Xing</a>
            <a href="#" class="def-btn btn-bg-yellow" data-toggle="modal" data-target="#bookmark-job">Bookmark This Job</a-->
          </div>
        </div>
      </div><!--/.job-banner -->

      <!-- Bookmark Dialog Starts -->
      <div class="modal fade bookmark-job" id="bookmark-job" role="divialog">
        <div class="modal-dialog bookmark-job-dialog">
          <div class="bookmark-job-content">
            <div class="bookmark-job-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3>Bookmark This Job</h3>
              <hr>
            </div>
            <div class="bookmark-job-body">
              <form class="form-horizontal">
                <textarea class="def-input"></textarea>
                <a href="#"><div class="bookmark-btn">Add Bookmark</div></a>
              </form>
            </div>
          </div><!--/.login-content-->
        </div>
      </div>
      <!-- Bookmark Dialog Ends -->

      <!-- Apply Job Dialog Starts -->
      <div class="modal fade apply-job" id="apply-job" role="dialog">
        <div class="modal-dialog apply-job-dialog">
          <div class="apply-job-content">
            <div class="apply-job-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h3>Apply This Job</h3>
              <hr>
            </div>
            <div class="apply-job-body">
              <form class="form-horizontal">
                <div class="form-group">
                  <div class="col-md-12">
                    <div class="col-md-12 col-sm-12">
                      <strong>Full Name*</strong>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <input type="text" class="def-input" placeholder="Your fullname">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <div class="col-md-12 col-sm-12">
                      <strong>Email*</strong>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <input type="text" class="def-input" placeholder="Your Name">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <div class="col-md-12 col-sm-12">
                      <strong>Message*</strong>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <textarea class="def-input" placeholder="Your Message. Be persuasive.."></textarea>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <div class="col-md-12 col-sm-12">
                      <strong>Lorem Ipsum*</strong>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <select name="" id="" class="def-input def-select">
                        <option value="" selected disabled>Choose Type</option>
                        <option value="lorem">lorem</option>
                        <option value="ipsum">ipsum</option>
                        <option value="dolor">dolor</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-12">
                    <div class="col-md-12 col-sm-12">
                      <strong>Upload CV*</strong>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <div class="def-btn upload-file-btn">
                        <span><i class="fa fa-upload"></i>&nbsp; Browse File</span>
                        <input type="file" class="upload">
                      </div>
                    </div>
                  </div>
                </div>
                <a href="#"><div class="apply-btn">Apply This Job</div></a>
              </form>
            </div>
          </div><!--/.login-content-->
          
        </div>
      </div>
      <!-- Apply Job Dialog Ends -->
<?php $jid=$_GET['jid'];
    $row1=$con->select_up("jobpost_master","j_id",$jid);
    $jobtype_id=$row1['jobtype_id'];
    $row2=$con->select_up("jobtype_master","jtype_id",$jobtype_id);
    $r_id=$row1['r_id'];
    $row3=$con->select_up("role_master","r_id",$r_id);
    $subr_id=$row1['subr_id'];
    $subr_name=$con->select_up("subrole_master","subr_id",$subr_id);
  $state=$con->select_up("state_master","state_id",$row1['state_id']);
  $city=$con->select_up("city_master","city_id",$row1['city_id']);
?>

      <div class="job-details-content animated wow fadeIn" data-wow-delay="0.2s">
        <div class="container">
          <div class="heading sec-h-pad-t">
            <div class="col-md-9 col-sm-9">
              <!--/.company-logo -->
                <div class="sub-heading">
                  <span><i class="fa fa-briefcase"></i> &nbsp; <?php echo $row1['j_name'] ;?></span>
                  <span><i class="fa fa-map-marker"></i> &nbsp; <?php echo "$state[1] , $city[2]"; ?></span>
                  <span><i class="fa fa-money"></i> &nbsp; <?php echo "$row1[6] - $row1[7]"; ?></span>
                </div>
            </div><!--/.col-md-4 -->

            <!-- <div class="col-md-3 col-sm-3">
              <div class="share-this-job">
                  <h4>share this job</h4>
                  <a href="#" class="social-media">
                    <i class="fa fa-google-plus"></i>
                  </a>
                  <a href="#" class="social-media">
                    <i class="fa fa-instagram"></i>
                  </a>
                  <a href="#" class="social-media">
                    <i class="fa fa-twitter"></i>
                  </a>
                  <a href="#" class="social-media">
                    <i class="fa fa-facebook"></i>
                  </a>
              </div>
            </div> --><!--/.col-md-3 md-offset-5 -->

          </div><!--/.heading -->

          <div class="content col-md-12 col-sm-12 sec-h-pad-t sec-pad-b">

            <div class="col-md-8 col-sm-8 details">
              <div class="image">
                <img src="../assets/image/cmp_image/<?php echo $row[16]; ?>" alt="">
              </div>
              <h4>Job Address</h4>
              <p><?php echo "$row[9]"; ?></p>
              <h4>Job Description</h4>
              <p><?php echo "$row1[12]"; ?></p>

              
            </div><!--/.details -->

            <div class="col-md-4 col-sm-4 company-about">
              <h4>Connect with us</h4>
              <a href="#"><?php echo $row[6]; ?></a>
            </div><!--/.company-about -->
            <div class="col-md-4 col-sm-4" style="margin-top: 30px;">
              <h4>Review</h4>
              <div class="user_review_container">
                <?php 
                $qry="select * from review where j_id=".$jid;
                $res=mysqli_query($con->con,$qry);
                if (mysqli_num_rows($res)==0) {
                  echo "No Review Found";
                }
                while ($review_row=mysqli_fetch_array($res)) {
                  $user_info=$con->select_up("candidate_master","cnd_id",$review_row[1]);
                ?>
                  <div class="user_review">
                      <div class="small_profile_pic">
                          <img src="../assets/image/cnd_image/<?php echo $user_info['cnd_img'];?>" style="height: 100%;width: 100%;">
                      </div>
                      <div class="user_review_right">
                          <div class="user_review_name"><?php echo $user_info['f_name']." ".$user_info['l_name']; ?></div>
                          <div class="user_review_rating">
                          <?php
                              $star=$review_row['rate'];
                              if($star>=1)
                                  echo '<span><i class="fa fa-star orange"></i></span>';
                              elseif ($star==0.5)
                                  echo '<span><i class="fa fa-star-half-o orange"></i></span>';
                              
                              if($star>=2)
                                  echo '<span><i class="fa fa-star orange"></i></span>';
                              elseif ($star==1.5)
                                  echo '<span><i class="fa fa-star-half-o orange"></i></span>';
                              
                              if($star>=3)
                                  echo '<span><i class="fa fa-star orange"></i></span>';
                              elseif ($star==2.5)
                                  echo '<span><i class="fa fa-star-half-o orange"></i></span>';
                              
                              if($star>=4)
                                  echo '<span><i class="fa fa-star orange"></i></span>';
                              elseif ($star==3.5)
                                  echo '<span><i class="fa fa-star-half-o orange"></i></span>';
                              
                              if($star>=5)
                                  echo '<span><i class="fa fa-star orange"></i></span>';
                              elseif ($star==4.5)
                                  echo '<span><i class="fa fa-star-half-o orange"></i></span>';
                          ?>
                          </div>
                      </div>
                      <div class="user_review_text"><?php echo $review_row['des']; ?></div>
                  </div>
                <?php }?>
              </div>
            </div><!--/.company-about -->

          </div><!--/.content -->

        </div><!--/.container -->
      </div><!--/.job-details-content -->
    </section>

    <!-- Got a Question Starts -->
   <?php include_once 'got.php';?><!--/.got-a-question -->
    <!-- Got a Question Ends -->

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

<!-- Mirrored from demo.suavedigital.com/jobstar/job-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:28:18 GMT -->
</html>