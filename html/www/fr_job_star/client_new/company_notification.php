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
<?php
include_once("connection.php");
$con = new JobClass;
$connection = mysqli_connect("localhost","root","","job180") or die(mysql_error());

$data['is_read']=0;
$con->updatation("apply_master",$data,"is_read","1");
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demo.suavedigital.com/jobstar/browse-resumes.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:39 GMT -->
<head>
   <?php include_once("add_once_head.php"); ?>
  </head>

  <body>
<style type="text/css">
  .a:onclick{
   background: black; 
  }
</style>

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
        <h2>Notifications</h2>
      </div>
    </section>
    <!-- Banner Grey Ends -->
    <?php
      
    ?>
    <section class="browse-resumes sec-hq-pad-t sec-hq-pad-b">
      <div class="container">
        <div class="resume-list-container sec-h-pad-t animated wow fadeIn" data-wow-delay="0.2s">
          <?php
          $k=$_SESSION['key'];
          $cnd=$con->select_up("candidate_master","serial_key",$k);
          $cnd_id=$cnd['cnd_id'];
          $ap_sql=$con->select_mul("apply_master","cnd_id",$cnd_id);
          while($apply_row=mysqli_fetch_array($ap_sql))
          {
            $cmp_id=$apply_row['cmp_id'];
            $cmp=$con->select_up("company_master","cmp_id",$cmp_id);
            $j_id=$apply_row['j_id'];
            $job_post=$con->select_up("jobpost_master","j_id",$j_id);
            //$subrole=$con->select_up("subrole_master","subr_id",$job_post['subr_id']);
            $state=$con->select_up("state_master","state_id","$job_post[10]");
            $city=$con->select_up("city_master","city_id","$job_post[11]");
            if($apply_row['is_approve']==2)
            {
              ?>
              <a href="job_details.php?cid=<?php echo $apply_row[1];?>&jid=<?php echo $apply_row['j_id'] ;?>">
                <div class="resume-list valign-wrap">
                  <div class="photo-wrap valign-middle content-wrap">
                    <div class="photo">
                      <img src="../assets/image/cmp_logo/<?php echo $cmp[15]; ?>" style="border-radius: 40%; height: 90px;">
                    </div>
                  </div>
                  <div class="name valign-middle content-wrap">
                    <h4><?php echo $cmp[2]; ?> - <?php echo $job_post['j_name']; ?></h4>
                    <p><span><?php echo "Your Resume Is Rejected"; ?></span></p>
                  </div>
                </div><!--/.job-list -->
              </a>
              <?php
            }
            else
            {
              if($apply_row['is_approve']==1)
              {
            ?>
                <a href="job_details.php?cid=<?php echo $apply_row[1];?>&jid=<?php echo $apply_row['j_id'] ;?>">
                <div class="resume-list valign-wrap">
                  <div class="photo-wrap valign-middle content-wrap">
                    <div class="photo">
                      <img src="../assets/image/cmp_logo/<?php echo $cmp[15]; ?>" style="border-radius: 40%; height: 90px;">
                    </div>
                  </div>
                  <div class="name valign-middle content-wrap">
                    <h4><?php echo $cmp[2]; ?> - <?php echo $job_post['j_name']; ?></h4>
                    <p><span> Your Resume Is Selected  </span> </p>
                  </div>
                  <div class="location valign-middle content-wrap">
                    <i class="fa fa-map-marker"></i> &nbsp; <?php echo "$state[1], $city[2]"; ?>
                  </div>
                </div><!--/.job-list -->
              </a>
              <?php
            }
            }
          }
          ?>
      <?php
          /*$apply_sql="select * from apply_master where cnd_id=$cnd_id and is_approve=1 ORDER BY ap_id DESC";
          $apply_result=mysqli_query($connection,$apply_sql);
          while($apply_row=mysqli_fetch_array($apply_result))
          {
            //print_r($city);
         }*/ ?>          
        </div><!--/.job-list-container -->

        <!-- <div class="col-md-12 text-center sec-h-pad-t">
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
 -->
      </div>
    </section>

    <!-- Footer Starts -->
    <?php include_once 'footer.php';
    include_once 'add_once_body.php' ; ?>
  </body>

<!-- Mirrored from demo.suavedigital.com/jobstar/browse-resumes.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:39 GMT -->
</html>