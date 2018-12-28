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
$page1=0;
?>
<?php
include_once("connection.php");
$con = new JobClass;
$connection = mysqli_connect("localhost","root","","job180") or die(mysql_error());

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
            <h2>Browse Resumes</h2>
          </div>
        </section>
        <!-- Banner Grey Ends -->
        <section class="browse-resumes sec-hq-pad-t sec-hq-pad-b">
          <div class="container">
              <div class="resume-list-container sec-h-pad-t animated wow fadeIn" data-wow-delay="0.2s">
                <?php
                if(isset($_GET["did"]))
                  {
                    $did=$_GET["did"];
                    //$data["is_active"]=1;
                    $data["is_approve"]=2;
                    $con->updatation("apply_master",$data,"ap_id",$did);
                    header("location:approved.php");
                  }
                  if(isset($_GET['page']))
                  {
                      $page = $_GET['page'];
                      if($page=="" || $page==1)
                      {
                      $page1=0;
                      }
                      else
                      {
                        $page1=($page*10)-10;
                      }
                    }
                $k=$_SESSION['c_key'];
                $cmp=$con->select_up("company_master","serial_key","$k");
                //print_r($cmp);
                $cmp_id=$cmp[0];
                $iid="";
                $i = 0;
                $sql_app="select * from apply_master where cmp_id= $cmp_id and is_approve=1 ORDER BY ap_id DESC limit $page1,10";
                $res=mysqli_query($connection,$sql_app);
                //$res=$con->select_mul("apply_master","cmp_id","$cmp_id");
                while($row=mysqli_fetch_array($res))
                {
                //print_r($apply);
                $cnd_id=$row["cnd_id"];
                $ap_id=$row[0];
                $cnd=$con->select_up("candidate_master","cnd_id",$cnd_id);
                $iid[$i]=$cnd[2]. $i;
                $education=$con->select_up("education_master","cnd_id",$cnd_id);
                //print_r($education);
                $experience=$con->select_up("experience_master","cnd_id",$cnd_id);
                $subrole=$con->select_up("subrole_master","subr_id",$education[5]);
                $state=$con->select_up("state_master","state_id","$cnd[7]");
                $city=$con->select_up("city_master","city_id","$cnd[8]");
                $job_id=$row['j_id'];
                $job_post=$con->select_up("jobpost_master","j_id", $job_id);
                //print_r($experience);
                //print_r($subrole);
                //echo $subrole[2];
                ?>
                <a href="resume_details.php?cnd_id=<?php echo $cnd_id; ?>">
                  <div class="resume-list valign-wrap">
                    <div class="photo-wrap valign-middle content-wrap">
                      <div class="photo">
                        <img src="../assets/image/cnd_image/<?php echo $cnd[12]; ?>" style="border-radius: 40%; height: 90px;">
                      </div>
                    </div>
                    <div class="name valign-middle content-wrap">
                      <h4><?php echo "$cnd[2] $cnd[3]"; ?></h4>
                      <p><span> Job Apply For - <?php echo $job_post[3];  ?></span>
                      <p><span><?php echo $subrole[2]; ?></span> - <?php echo $education[11]; ?></p>
                    </div>
                    <div class="location valign-middle content-wrap">
                      <i class="fa fa-map-marker"></i> &nbsp; <?php echo "$state[1],$city[2],"; ?>
                    </div>
                    
                    <div class="job-type fulltime valign-middle content-wrap">
                      <?php
                      $ext= $education[10];
                      $extra_skill=explode(",", $ext);
                      foreach ($extra_skill as $key => $value)
                      {
                      echo "<div>$value</div><br>";
                      }
                      ?>
                    </div>
                    <div class="job-type valign-middle content-wrap">
                      <h4><?php echo $cnd[11]; ?></h4>
                    </div>
                    </div><!--/.job-list -->
                  </a>
                  <div class="exp-salary valign-middle content-wrap col-sm-2">
                    <a href="?did=<?php echo $row[0]; ?>" class="def-btn btn-bg-yellow" onClick="return confirm('Are you sure to delete??');">Delete</a>
                  </div>
                  <!-- <div class="valign-middle content-wrap col-sm-2">
                    <input type="checkbox" name="chk[]" value="<?php //echo $row['ap_id']; ?>" id="<?php// echo $cnd[2] ; ?>" class="checkbox-inline">[Interview Date]
                  </div> -->
                  <?php
                  $i++; }
                  ?>
                  </div><!--/.job-list-container -->
                  <div class="col-md-12 text-center sec-h-pad-t">
                    <ul class="pagination">
                      <li><a href="?page=1"><i class="fa fa-angle-left"></i></a></li>
                      <?php
                      $sql_app2="select * from apply_master where cmp_id= $cmp_id and is_approve=1 ORDER BY ap_id DESC";
                      $con2 = mysqli_connect("localhost","root","","job180") or die(mysql_error());
                      $result_s2=mysqli_query($con2,$sql_app2);
                      $cou=mysqli_num_rows($result_s2);
                      $a = $cou/10;
                      $a=ceil($a);
                      $i=0;
                      
                      for($b=1; $b<=$a; $b++)
                      {
                        $arr[] = ($b);
                        if(isset($_GET['page']))
                        {
                          $page=$_GET['page'];
                        }
                        else
                        {
                          $page=1;
                        }
                        ?>

                        <li><a class="<?php if($page == $b) { echo "active"; } ?>" href="?page=<?php echo $b;?>"><?php echo $b; ?></a></li>
                        <?php
                      }
                   
                       ?>
                    <li><a href="?page=<?php echo $b; ?>"><i class="fa fa-angle-right"></i></a></li>
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