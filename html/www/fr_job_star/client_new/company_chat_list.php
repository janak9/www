<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
$k=$_SESSION['c_key'];
}
if(!isset($_SESSION["c_key"]))
{
header("location:index.php");
$page1=0;
}
?>
<?php
include_once("connection.php");
$con = new JobClass;
$connection = mysqli_connect("localhost","root","","job180") or die(mysql_error());
$page1=0;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include_once("add_once_head.php"); ?>
  </head>
  <body>
    
    <!-- Navbar Start -->
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-bg-white">
      <div class="container">
        <?php include('company_menu.php');?>
        <!-- Banner Grey Starts -->
        <section class="banner-grey">
          <div class="container sec-hq-pad-t sec-hq-pad-b animated wow fadeIn">
            <h2>Chat List</h2>
          </div>
        </section>
        <!-- Banner Grey Ends -->
        <section class="browse-resumes sec-hq-pad-t sec-hq-pad-b">
          <div class="container">
              <div class="resume-list-container sec-h-pad-t animated wow fadeIn" data-wow-delay="0.2s">
                <?php
                $k=$_SESSION['c_key'];
                $cmp=$con->select_up("company_master","serial_key","$k");
                //print_r($cmp);
                $cmp_id=$cmp[0];
                $i = 0;
                $sql_app="select * from (select * from chat where reciever='company' and r_id=$cmp_id order by id DESC) AS tmp group by s_id order by id DESC";
                $res=mysqli_query($connection,$sql_app);
                //$res=$con->select_mul("apply_master","cmp_id","$cmp_id");
                while($row=mysqli_fetch_array($res))
                {
                $cnd=$con->select_up("candidate_master","cnd_id",$row['s_id']);
                ?>
                <a href="company_chat.php?&r_id=<?php echo $row[2];?>">
                  <div class="resume-list valign-wrap">
                    <div class="photo-wrap valign-middle content-wrap">
                      <div class="photo">
                        <img src="../assets/image/cnd_image/<?php echo $cnd[12]; ?>" style="border-radius: 40%; height: 90px;">
                      </div>
                    </div>
                    <div class="name valign-middle content-wrap">
                      <h4><?php echo "$cnd[2] $cnd[3]"; ?></h4>
                      <p><span><?php echo $row['msg'];?></span></p>
                    </div>
                  </div><!--/.job-list --></a>
                  <?php
                  }
                  ?>
              </div><!--/.job-list-container -->
              </section>
              <!-- Footer Starts -->
              <?php include_once 'footer.php';
              include_once 'add_once_body.php' ; ?>
            </body>
            <!-- Mirrored from demo.suavedigital.com/jobstar/browse-resumes.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:39 GMT -->
          </html>