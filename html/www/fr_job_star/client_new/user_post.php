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
            <h2>Browse Resumes</h2>
          </div>
        </section>
        <!-- Banner Grey Ends -->
        <section class="browse-resumes sec-hq-pad-t sec-hq-pad-b">
          <div class="container">
          <!--   <div class="col-md-12 col-sm-12 search-panel form-group animated wow fadeIn" data-wow-delay="0.2s">
              <div class="input-group">
                
                <div class="input-col">
                  <div class="form-group">
                    <input type="text" class="def-input" placeholder="Keywords">
                  </div>
                </div>
                
                <div class="input-col">
                  <div class="form-group">
                    <input type="text" class="def-input" placeholder="Location">
                  </div>
                </div>
                
                <div class="input-col">
                  <div class="form-group">
                    <select name="job-categories" id="job-categories" class="def-input def-select">
                      <option value="" selected disabled>Choose Category</option>
                      <option value="financeaccount"> Financial / Accounting</option>
                      <option value="buildconstruct">Building / Construction</option>
                      <option value="edutrain">Education / Training</option>
                      <option value="marketsale">Marketing / Sales</option>
                      <option value="admin">Administration</option>
                      <option value="IT">Computer / IT</option>
                      <option value="health">Health</option>
                      <option value="science">Science</option>
                      <option value="artmedia">Art / Media</option>
                      <option value="technical">Technical</option>
                      <option value="manufacturing">Manufacturing</option>
                      <option value="other">Other</option>
                    </select>
                  </div>
                </div>
                <div class="search-col">
                  <a href="#" class="search-btn"><i class="fa fa-search"></i></a>
                </div>
              </div>
              <div class="col-md-12 checkboxes">
                <label class="checkbox-inline">
                  <input type="checkbox">Full Time
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox">Part Time
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox">Freelance
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox">Internship
                </label>
                <label class="checkbox-inline">
                  <input type="checkbox">Temporary
                </label>
              </div>
            </div> --><!--/.search-panel -->
            <?php 
                  if(isset($_GET['page']))
                    {
                      $page = $_GET['page'];
                      if($page=="" || $page==1)
                      {
                      $page1=0;
                      }
                      else
                      {
                        $page1=($page*5)-5;
                      }
                    }

            ?>
              <div class="resume-list-container sec-h-pad-t animated wow fadeIn" data-wow-delay="0.2s">
                <?php
                if(isset($_GET["uid"]))
                {
                $ap_id=$_GET["uid"];
                $data["is_approve"]=1;
                $data["is_read"]=1;
                //print_r($data);
                $con->updatation("apply_master",$data,"ap_id",$ap_id);
                header("location:user_post.php");
                }
                if(isset($_GET["did"]))
                  {
                    $did=$_GET["did"];
                    $data1["is_approve"]=3;
                    $data1["is_read"]=1;
                    $con->updatation("apply_master",$data1,"ap_id",$did);
                    header("location:user_post.php");
                  }

                $k=$_SESSION['c_key'];
                $cmp=$con->select_up("company_master","serial_key","$k");
                //print_r($cmp);
                $cmp_id=$cmp[0];
                $iid="";
                $i = 0;
                $sql_app="select * from apply_master where cmp_id= $cmp_id ORDER BY ap_id DESC limit $page1,5";
                $res=mysqli_query($connection,$sql_app);
                //$res=$con->select_mul("apply_master","cmp_id","$cmp_id");
                while($row=mysqli_fetch_array($res))
                {
                  if ($row['is_approve']==0 or $row['is_approve']==2) {
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
                    <a href="user_post.php?uid=<?php echo $row[0]; ?>" class="def-btn btn-bg-blue">Approve</a>
                  </div>
                    <div class="exp-salary valign-middle content-wrap col-sm-2">
                    <a href="user_post.php?did=<?php echo $row[0]; ?>" class="def-btn btn-bg-yellow" onClick="return confirm('Are you sure to delete??');">Delete</a>
                  </div>
                  <!-- <div class="valign-middle content-wrap col-sm-2">
                    <input type="checkbox" name="chk[]" value="<?php //echo $row['ap_id']; ?>" id="<?php// echo $cnd[2] ; ?>" class="checkbox-inline">[Interview Date]
                  </div> -->
                  <?php
                  $i++;
                  } }
                  ?>
                  </div><!--/.job-list-container -->
                  <div class="col-md-12 text-center sec-h-pad-t">
                    <ul class="pagination">
                      <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                    <?php
                    $cnd_id=$row["cnd_id"];
                    $cnd=$con->select_up("candidate_master","cnd_id",$cnd_id);
                  $cnd_id=$cnd['cnd_id'];
                  $sql_app="select * from apply_master where cmp_id= $cmp_id and (is_approve=0 or is_approve=2)";
                  $res=mysqli_query($connection,$sql_app);
                    $cou=mysqli_num_rows($res);
                      $a = $cou/5;
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
                        //print_r($arr);
                      ?>  
                        <li><a class="<?php if($page == $b) { echo "active"; } ?>" href="?page=<?php echo $b;?>"><?php echo $b; ?></a></li>
                      <?php 
                      $i++;
                      }
                    ?>
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