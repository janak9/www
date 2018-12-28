<?php
ob_start();
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
$add=$row['address'];
if(isset($add))
{?>
  <script>alert('Already Your Resume Is Created');
    window.location.href="candidate_profile.php";
  </script>
<?php 
}
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

  $erfname="";
  $erlname="";
  $ergen="";
  $eradd="";
  $erpin="";
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
  
  if(!preg_match("/^[A-Za-z]+$/", $_POST["fname"]))
  {
  $erfname="<p class='erText'>Name Must Be Form Of Text Not Allow Number Or Other Characters</p>";
  }
  if(!preg_match("/^[A-Za-z]+$/", $_POST["lname"]))
  {
  $erlname="<p class='erText'>Name Must Be Form Of Text Not Allow Number Or Other Characters</p>";
  }
  if(@$_POST["gender"] == "")
  {
  $ergen="<p class='erText'>Select Gender</p>";
  }
  if(!preg_match("/^[A-Za-z0-9_ .,:\"\']+$/", $_POST["address"]))
  {
  $eradd="<p class='erText'>Enter Your Address</p>";
  }
  if(!preg_match("/^\d{6}$/", $_POST["pincode"]))
  {
  $erpin="<p class='erText'>Pin Code Must Be 6 Digits</p>";
  }
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
          if(isset($_POST['submit']))
          {
          $k=$_SESSION['key'];
          $row=$con->select_up("candidate_master","serial_key","$k");
          //echo $row[0];
          
          $data["gender"]=$_POST["gender"];
          $data["address"]=$_POST["address"];
          $data["pincode"]=$_POST["pincode"];
          $data["state_id"]=$_POST["state"];
          $data["city_id"]=$_POST["city"];
          $datas=$_POST["dob"];
          $date=date_create("$datas");
          $data["dob"]=date_format($date,"Y-m-d");
          $data["jobtype_id"]=$_POST["job"];
          $data["expected_salary"]=$_POST["ex_salary"];
          //$file_tmp=$_FILES["img"]["tmp_name"];
          //$data_fl=$_FILES['img'];
          //$data["cnd_img"]=$con->img_upload($data_fl,"../assets/image/cnd_image/");
          //print_r($data);
          $con->updatation('candidate_master',$data,"cnd_id","$row[0]");
          
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

          $data2["candid"]=$row[0];
          $data2["job_name"]=$_POST["Positon"];
          $data2["cmpname"]=$_POST["cmp_name"];
          $data2["sname"]=$_POST["state2"];
          $data2["cname"]=$_POST["city2"];
          @$data2["expyear"]=$_POST["exp_year"];
          //print_r($data);
          $con->insertion('experience_master',$data2);
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
                
                <div class="personal-data col-md-12">
                  <div class="col-md-12">
                    <div class="title-underlined">
                      <h3>Personal Data</h3>
                    </div>
                  </div>
                  <!-- <div class="col-md-3 col-sm-3 col-xs-12"> -->
                  <!-- <div class="user-photo-wrap valign-wrap">
                    <div class="user-photo valign-middle">
                      <i class="fa fa-photo"></i>
                    </div>
                    <input type="file" class="upload" name="img" id="img">
                  </div>
                </div> -->
                <form method="post" action="image_upload.php" enctype="multipart/form-data">
                  <div class="col-md-3 col-sm-3 col-xs-12 content-wrap">
                    <div class="user-photo-wrap valign-wrap">
                      <img class="user-photo valign-middle"  src="../assets/image/cnd_image/<?php echo @$row[12];?>">
                      <input type="file" class="upload" name="img" value="<?php echo @$row[12]; ?>" onchange="form.submit();" />
                    </div>
                  </div>
                </form>
                <form action="#" class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="col-md-9 col-sm-9">
                    <div class="form-group">
                      <div class="col-md-12">
                        <div class="col-md-12 col-sm-12">
                          <strong> FirstName</strong>
                        </div>
                        <div class="col-md-6 col-sm-6">
                          <input type="text" class="def-input" placeholder="Your First Name" name="fname" value="<?php if(@$_REQUEST['fname']){echo $_REQUEST['fname'];}else{if(isset($row['f_name'])){ echo $row['f_name']; }} ?>">
                          <?php if(isset($erfname)){echo $erfname;}?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <div class="col-md-12">
                          <strong>last name</strong>
                        </div>
                        <div class="col-md-12">
                          <input type="text" class="def-input" placeholder="Your Last Name" name="lname" value="<?php if(@$_REQUEST['lname']){echo $_REQUEST['lname'];}else{if(isset($row['l_name'])){ echo $row['l_name']; }} ?>">
                          <?php if(isset($erlname)){echo $erlname;}?>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12">
                          <strong>gender</strong>
                        </div>
                        <div class="col-md-6 col-sm-6">
                          <input type="radio"  name="gender" value="male" <?php if(@$_REQUEST['gender']=="male"){echo " checked";}?>>Male
                          <input type="radio"  name="gender" value="female" <?php if(@$_REQUEST['gender']=="female"){echo " checked";}?>>Female
                        </div>
                          <?php if(isset($ergen)){echo $ergen;}?>
                        
                      </div>
                      <div class="form-group">
                        <div class="col-md-12">
                          <strong>Address</strong>
                        </div>
                        <div class="col-md-12">
                          <textarea class="def-input" placeholder="Enter Your Address" rows="2" name="address"><?php  if(@$_REQUEST['address']){echo $_REQUEST['address'];}?></textarea>
                          <?php if(isset($eradd)){echo $eradd;}?>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <div class="form-group">
                        <div class="col-md-12">
                          <strong>Pincode</strong>
                        </div>
                        <div class="col-md-12">
                          <input type="text" class="def-input" placeholder="pincode" name="pincode" value="<?php if(@$_REQUEST['pincode']){echo $_REQUEST['pincode'];}?>">
                          <?php if(isset($erpin)){echo $erpin;}?>
                        </div>
                      </div>
                      <script type="text/javascript">
                      $(document).ready(function()
                      {
                      $('#state').on('change',function()
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
                      $('#city').html(html);
                      }
                      });
                      }
                      else
                      {
                      $('#city').html('<option value="" style=" text-transform:capitalize;">not selecte sub city</option>');
                      }
                      });
                      });
                      </script>
                      <div class="form-group">
                        <div class="col-md-12">
                          <strong>State</strong>
                        </div>
                        <div class="col-md-12">
                          <select class="def-input" name="state" id="state">
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
                          <select class="def-input" name="city" id="city">
                            <option>Select City</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        
                        <div class="col-md-12">
                          <strong>Birth date</strong>
                        </div>
                        <div class="col-md-12">
                          <input type="text" class="def-input" id="datepicker" value="<?php if(@$_REQUEST['dob']){echo $_REQUEST['dob'];}?>"" placeholder="DD/MM/YYYY" name="dob">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12">
                          <strong>job type</strong>
                        </div>
                        <div class="col-md-9 col-md-9">
                          <select class="def-input" name="job" id="job">
                            <option>Select Job Type</option>
                            <?php
                            $result_select=$con->data_dd("jobtype_master");
                            while($row=mysqli_fetch_array($result_select))
                            {
                            ?>
                            <option value="<?php echo $row[0]; ?> "> <?php echo $row[1]; ?> </option>";
                            <?php
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12">
                          <strong>Expected Salary</strong>
                        </div>
                        <div class="col-md-9 col-md-9">
                          <input type="text" class="def-input" placeholder="ex_salary" name="ex_salary" value="<?php if(@$_REQUEST['ex_salary']){echo $_REQUEST['ex_salary'];}?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="education col-md-6 col-sm-6 sec-hq-pad-t content-wrap">
                    <div class="form-header">
                      <h4>Education</h4>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <strong>Degree</strong>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="def-input" placeholder="degree" name="degree" value="<?php if(@$_REQUEST['degree']){echo $_REQUEST['degree'];}?>">
                        <?php if(isset($erdgr)) {echo $erdgr; }?>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <strong>Collage Name</strong>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="def-input" placeholder="Collage Name" name="clg_name" value="<?php if(@$_REQUEST['clg_name']){echo $_REQUEST['clg_name'];}?>">
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
                      <div class="col-md-12">
                        <h4>Personal Skill</h4>
                      </div>
                      <div class="col-md-12">
                        <strong>Skill Name</strong>
                      </div>
                      <div class="col-md-12">
                        <input type="text" class="def-input" placeholder="Skill Name" name="extra_skill"  value="<?php if(@$_REQUEST['extra_skill']){echo $_REQUEST['extra_skill'];}?>">
                        <?php if(isset($erskill)) {echo $erskill; }?>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <strong>Description</strong>
                      </div>
                      <div class="col-md-12">
                        <textarea class="def-input" placeholder="Skill Name" name="des" rows="2" id="des"><?php if(@$_REQUEST['des']){echo $_REQUEST['des'];}?></textarea>
                      </div>
                    </div>
                    </div><!--/.education -->
                    <div class="work-exp col-md-6 col-sm-6 sec-hq-pad-t content-wrap">
                      <div class="form-header">
                        <h4>Working Experience</h4>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12">
                          <strong>Company Name</strong>
                        </div>
                        <div class="col-md-12">
                          <input type="text" class="def-input" placeholder="Company Name" name="cmp_name" id="cmp_name" value="<?php if(@$_REQUEST['cmp_name']){echo $_REQUEST['cmp_name'];}?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12">
                          <strong>Positon</strong>
                        </div>
                        <div class="col-md-12">
                          <input type="text" class="def-input" placeholder="Position" name="Positon" value="<?php if(@$_REQUEST['Positon']){echo $_REQUEST['Positon'];}?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12">
                          <strong>State</strong>
                        </div>
                        <div class="col-md-12">
                          <script type="text/javascript">
                          $(document).ready(function()
                          {
                          $('#state2').on('change',function()
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
                          $('#city2').html(html);
                          }
                          });
                          }
                          else
                          {
                          $('#city2').html('<option value="" style=" text-transform:capitalize;">not selecte sub city</option>');
                          }
                          })
                          });
                          </script>
                          <select class="def-input" name="state2" id="state2">
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
                          <select class="def-input" name="city2" id="city2">
                            <option>Select City</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12">
                          <strong>Experience Year</strong>
                        </div>
                        <div class="col-md-6 col-sm-6">
                          <select name="exp_year" id="exp_year" class="def-input def-select">
                            <option value="" disabled selected>Experience Year</option>
                            <?php
                            for ($i=0; $i <= 10 ; $i++) {
                            ?>
                            <option value="<?php echo "$i  Year" ; ?>"><?php echo "$i  Year"; ?></option>
                            <?php
                            }
                            ?>
                            <option value="more">More</option>
                          </select>
                        </div>
                      </div>
                      </div><!--/.professional-skill -->
                      <div class="col-md-12 sec-h-pad-t text-right">
                        <input type="submit" name="submit" class="def-btn btn-bg-blue" value="Finish">
                      </div>
                    </form>
                    
                    </div><!--/.container -->
                    </div><!--/.form-content -->
                  </section>
                  <?php include_once 'footer.php';  ?>
                  <?php include_once 'add_once_body.php';  ?>
                </body>
              </html>