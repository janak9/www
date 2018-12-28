<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
$k=$_SESSION["key"];
}
if(!isset($_SESSION["key"]))
{
header("location:index.php");
}
// $con=mysqli_connect("localhost","root","","job180") or die(mysql_error());
// $k=$_SESSION['c_key'];
include_once("connection.php");
$con = new JobClass;
if(isset($_SESSION["key"]))
{
$k=$_SESSION['key'];
$row=$con->select_up("candidate_master","serial_key","$k");
/*$add=$row['address'];
if(isset($add))
{
header("location:candidate_profile.php");
}*/
}
?>
<!DOCTYPE html>
<html lang="en">
  <!-- Mirrored from demo.suavedigital.com/jobstar/create-resume.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:41 GMT -->
  <head>
    <?php include_once("add_once_head.php"); ?>
    <style type="text/css">
    .erText{
    font-family: Arial;
    font-size: 15px;
    color:#cc0000;
    text-decoration: none;
    font-weight: normal;
    }
    </style>
  </head>
  <?php
  if(isset($_POST['submit']))
  {
  $erstate="";
  $ercity="";
  $erbod="";
  $erjob="";
  $ersal="";
  $erclg="";
  $erskill="";
  $erdgr="";
  $erfile="";
  
  /*$erpwd="";
  $eremail="";*/
  
  if(!preg_match("/^[A-Za-z, ]+$/", $_POST["degree"]))
  {
  $erdgr="<p class='erText'>Enter Your Degree</p>";
  }
  if(!preg_match("/^[A-Za-z0-9 _,.&]+$/", $_POST["clg_name"]))
  {
  $erclg="<p class='erText'>Enter Your College Name</p>";
  }
  if(!preg_match("/^[A-Za-z, &._]+$/", $_POST["extra_skill"]))
  {
  $erskill="<p class='erText'>Enter Your Skills</p>";
  }
  if(!isset($_POST["img"]))
  {
  $erskill="<p class='erText'>Select Image</p>";
  }
  }
  ?>
  
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
          <?php include('candidate_menu.php');?>
          
          <!-- Banner Grey Starts -->
          <section class="banner-grey">
            <div class="container sec-hq-pad-t sec-hq-pad-b">
              <h2 class="animated wow fadeIn">Create Resume</h2>
            </div>
          </section>
          <?php
          if(isset($_POST['submit']) and $erclg=="" and $erskill=="" and $erdgr=="" and $erfile=="")
          {
          $k=$_SESSION['key'];
          $row=$con->select_up("candidate_master","serial_key","$k");
          //echo $row[0];
          //echo $row[0];
          $data1[0]=$row[0];
          $data1["deg"]=$_POST["degree"];
          $data1["clgname"]=$_POST["clg_name"];
          $data1["sname"]=$_POST["s_name"];
          $data1["ssname"]=$_POST["ss_name"];
          $data1["state"]=$_POST["state1"];
          $data1["city"]=$_POST["city1"];
          @$data1["syear"]=$_POST["stating_year"];
          @$data1["eyear"]=$_POST["ending_year"];
          $data1["eskill"]=$_POST["extra_skill"];
          $data1["dese"]=$_POST["des"];
          $con->insertion('education_master',$data1);

          if(isset($cnd_id))
          {
          header("location:job_details.php?jid=$jid");
          }
          else
          {
          header("location:candidate_profile.php");
          }
          
          }
          ?>
          <section class="resume-form sec-hq-pad-t sec-hq-pad-b animated wow fadeIn" data-wow-delay="0.2s">
            <div class="form-content">
              <div class="container">
                <?php
                $k=$_SESSION['key'];
                $row=$con->select_up("candidate_master","serial_key","$k");
                ?>
                <form action="<?php ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="col-md-12 col-sm-12">
                    <div class="personal-data col-md-12">
                      <div class="col-md-12">
                        <div class="title-underlined">
                          <h3>Education</h3>
                        </div>
                      </div>
                      <div class="education col-md-6 col-sm-6 sec-hq-pad-t content-wrap">
                        
                        <div class="form-group">
                          <div class="col-md-12">
                            <strong>Degree</strong>
                          </div>
                          <div class="col-md-12">
                            <input type="text" class="def-input" placeholder="degree" name="degree">
                            <?php if(isset($erdgr)) {echo $erdgr; }?>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <strong>Collage Name</strong>
                          </div>
                          <div class="col-md-12">
                            <input type="text" class="def-input" placeholder="Collage Name" name="clg_name">
                            <?php if(isset($erclg)) {echo $erclg; }?>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <script type="text/javascript">
                            $(document).ready(function()
                            {
                            $('#state1').on('change',function()
                            {
                            var stateid=$(this).val();
                            if(stateid)
                            {
                            $.ajax
                            ({
                            type:'post',
                            url:'get_city.php',
                            data:'state_id='+stateid,
                            success:function(html)
                            {
                            $('#city1').html(html);
                            }
                            });
                            }
                            else
                            {
                            $('#city1').html('<option value="" style=" text-transform:capitalize;">not selecte sub city</option>');
                            }
                            })
                            });
                            </script>
                            <strong>State</strong>
                          </div>
                          <div class="col-md-12">
                            <select class="def-input" name="state1" id="state1">
                              <option>Select State</option>
                              <?php
                              $result_select=$con->data_dd("state_master");
                              while($row=mysqli_fetch_array($result_select))
                              {
                              echo "<option value='$row[0]' style='text-transform:capitalize;'> $row[1] </option>";
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <strong>CITY</strong>
                          </div>
                          <div class="col-md-12">
                            <select class="def-input" name="city1" id="city1">
                              <option>Select City</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <strong>Period</strong>
                          </div>
                          <div class="col-md-6 col-sm-6">
                            <select name="stating_year" id="stating_year" class="def-input def-select">
                              <option value="" disabled selected>Stating year</option>
                              <?php
                              $year=date("Y");
                              for ($i=1988; $i <= $year ; $i++) {
                              ?>
                              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <div class="col-md-6 col-sm-6">
                            <select name="ending_year" class="def-input def-select">
                              <option value="" disabled selected>ending year</option>
                              <?php
                              $year=date("Y");
                              for ($i=1988; $i <= $year ; $i++) {
                              ?>
                              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    <div class="work-exp col-md-6 col-sm-6 sec-hq-pad-t content-wrap">
                        <div class="form-header">
                          <h4>Professional Skill</h4>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <strong>Skill Name</strong>
                          </div>
                          <div class="col-md-12">
                            <script type="text/javascript">
                            $(document).ready(function()
                            {
                            $('#s_name').on('change',function()
                            {
                            var sid=$(this).val();
                            if(sid)
                            {
                            $.ajax
                            ({
                            type:'post',
                            url:'get_subrole.php',
                            data:'s_id='+sid,
                            success:function(html)
                            {
                            $('#ss_name').html(html);
                            }
                            });
                            }
                            else
                            {
                            $('#ss_name').html('<option value="">not selecte sub city</option>');
                            }
                            });``
                            });
                            </script>
                            <select class="def-input" name="s_name" id="s_name">
                              <option>Select Skill</option>
                              <?php
                              $result_select=$con->data_dd("role_master");
                              while($row=mysqli_fetch_array($result_select))
                              {
                              echo "<option value='$row[0]'> $row[1] </option>";
                              }
                              ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <select class="def-input" name="ss_name" id="ss_name">
                              <option>Select Sub Skill</option>
                            </select>
                          </div>
                          
                        </div>
                        
                        <div class="form-group">
                          <div class="form-header">
                          <h4>Personal Skill</h4>
                        </div>
                          <div class="col-md-12">
                            <strong>Skill Name</strong>
                          </div>
                          <div class="col-md-12">
                            <input type="text" class="def-input" placeholder="Skill Name" name="extra_skill">
                            <?php if(isset($erskill)) {echo $erskill; }?>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <strong>Description</strong>
                          </div>
                          <div class="col-md-12">
                            <textarea class="def-input" placeholder="Skill Name" name="des" rows="2" id="des"></textarea>
                          </div>
                        </div>
                        </div><!--/.education -->
                          <div class="col-md-12 sec-h-pad-t text-right">
                            <input type="submit" name="submit" class="def-btn btn-bg-blue" value="Add Education">
                          </div>
                        </form>
                        
                        </div><!--/.container -->
                        </div><!--/.form-content -->
                      </section>
                      <?php include_once 'footer.php';  ?>
                      <?php include_once 'add_once_body.php';  ?>
                    </body>
                  </html>