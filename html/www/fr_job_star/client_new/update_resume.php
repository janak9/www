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
  $eradd="";
  $erpin="";
  $erclg="";
  $erskill="";
  $erdgr="";
  
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
          
          $data["f_name"]=$_POST["fname"];
          $data["l_name"]=$_POST["lname"];
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
          //print_r($data);
          $con->updatation('candidate_master',$data,"cnd_id",$row[0]);
          
          //echo $row[0];
          $edu=$con->select_up("education_master","cnd_id","$row[0]");
          $data1["cnd_id"]=$row[0];
          $data1["degree"]=$_POST["degree"];
          $data1["clg_name"]=$_POST["clg_name"];
          $data1["r_id"]=$_POST["s_name"];
          $data1["subr_id"]=$_POST["ss_name"];
          $data1["state_id"]=$_POST["state1"];
          $data1["city_id"]=$_POST["city1"];
          @$data1["Starting_year"]=$_POST["stating_year"];
          @$data1["ending_year"]=$_POST["ending_year"];
          $data1["extra_skill"]=$_POST["extra_skill"];
          $data1["des"]=$_POST["des"];
          if(isset($edu))
          {
            $con->updatation('education_master',$data1,"edu_id","$edu[0]");
          }
          else
          {
          $con->insertion('education_master',$data1);
          }

          $exp=$con->select_up("experience_master","cnd_id","$row[0]");
          $data2["cnd_id"]=$row[0];
          $data2["job_name"]=$_POST["Positon"];
          $data2["cmp_name"]=$_POST["cmp_name"];
          $data2["state_id"]=$_POST["state2"];
          $data2["city_id"]=$_POST["city2"];
          @$data2["exp_year"]=$_POST["exp_year"];
          //print_r($data);
          if(isset($exp))
          {
             $con->updatation('experience_master',$data2,"exp_id","$exp[0]");
          }
          else
          {
              $con->insertion('experience_master',$data2);
          }
          header("location:candidate_profile.php");
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
                <form method="post" action="image_upload.php?abc=abc" enctype="multipart/form-data">
                    <div class="col-md-3 col-sm-3 col-xs-12 content-wrap">
                    <div class="user-photo-wrap valign-wrap">
                      <img class="user-photo valign-middle" src="../assets/image/cnd_image/<?php echo $row[12]; ?>">
                      <input type="file" class="upload" name="img" value="<?php echo $row[12]; ?>" onchange="form.submit();"/>
                    </div>
                  </div>
                    </form>
                <form action="#" class="form-horizontal" method="post"  enctype="multipart/form-data">
                      <div class="col-md-9 col-sm-9">
                        <div class="form-group">
                          <div class="col-md-12">
                            <div class="col-md-12 col-sm-12">
                              <strong> FirstName</strong>
                            </div>
                            <div class="col-md-6 col-sms-6">
                              <input type="text" class="def-input" placeholder="Your First Name" name="fname" value="<?php echo $row[2]; ?>">
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
                              <input type="text" class="def-input" placeholder="Your Last Name" name="lname" value="<?php echo $row[3]; ?>">
                              <?php if(isset($erlname)){echo $erlname;}?>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-12">
                              <strong>gender</strong>
                            </div>
                            <div class="col-md-6 col-sm-6">
                              <input type="radio"  name="gender" value="male" checked="checked" <?php if($row[4]=="male"){echo "checked"; } ?>>Male
                              <input type="radio"  name="gender" value="female" <?php if($row[4]=="female"){echo "checked"; } ?>>Female
                            </div>
                            
                          </div>
                          <div class="form-group">
                            <div class="col-md-12">
                              <strong>Address</strong>
                            </div>
                            <div class="col-md-12">
                              <textarea class="def-input" placeholder="Enter Your Address" rows="2" name="address"><?php echo $row[5]; ?></textarea>
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
                              <input type="Number" class="def-input" placeholder="pincode" name="pincode" value="<?php echo $row[6]; ?>">
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
                          $('#city').html('<option value="">not selecte sub city</option>');
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
                                <?php if(isset($k))
                                { ?>
                                <option>Select State</option>
                                <?php
                                $id=$row[7];
                                $res=$con->data_dd('state_master');
                                $row_sel=$con->select_up('state_master','state_id',$id);
                                // echo $row_sel[s];
                                while($row_state = mysqli_fetch_array($res))
                                { ?>
                                <option  value="<?php echo $row_state[0]; ?>" <?php if($row_sel[0] == $row_state[0])  {
                                  echo "selected" ;
                                  } ?>>
                                  <?php echo " $row_state[1] "; ?>
                                </option>
                                <?php
                                }
                                }
                                else
                                {
                                ?>
                                <?php
                                $result_select=$con->data_dd("state_master");
                                while($row_state=mysqli_fetch_array($result_select))
                                {
                                echo "<option value='$row_state[0]'> $row_state[1] </option>";
                                }
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
                                <?php if(isset($k))
                                { ?>
                                <option>Select City</option>
                                <?php
                                $id=$row[8];
                                $res=$con->data_dd('city_master');
                                $row_sel=$con->select_up('city_master','city_id',$id);
                                // echo $row_sel[1];
                                while($row_state = mysqli_fetch_array($res))
                                { ?>
                                <option  value="<?php echo $row_state[0]; ?>" <?php if($row_sel[0] == $row_state[0])  {
                                  echo "selected" ;
                                  } ?>>
                                  <?php echo " $row_state[2] "; ?>
                                </option>
                                <?php
                                }
                                }
                                else
                                {
                                ?>
                                <?php
                                $result_select=$con->data_dd("city_master");
                                while($row_state=mysqli_fetch_array($result_select))
                                {
                                echo "<option value='$row_state[0]'> $row_state[1] </option>";
                                }
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-12">
                              <strong>Birth date</strong>
                            </div>
                            <div class="col-md-12">
                              <?php
                              $k=$_SESSION['key'];
                              $row=$con->select_up("candidate_master","serial_key","$k");
                              ?>
                              <input type="text" class="def-input" id="datepicker" placeholder ="YYYY/MM/DD" name="dob" value="<?php echo $row[9]; ?>">
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
                                $id=$row[0];
                                $res=$con->data_dd('jobtype_master');
                                $row_sel=$con->select_up('jobtype_master','jobtype_id',$id);
                                // echo $row_sel[s];
                                while($row_state = mysqli_fetch_array($res))
                                ?>
                                <?php
                                $result_select=$con->data_dd("jobtype_master");
                                while($row=mysqli_fetch_array($result_select))
                                {
                                ?>
                                <option value="<?php echo $row[0];?>"  <?php if($row_sel[0] == $row_state[0])  {
                                  echo "selected" ;
                                } ?>> <?php echo $row[1]; ?> </option>";
                                <?php
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                           <?php
                            $k=$_SESSION['key'];
                            $row=$con->select_up("candidate_master","serial_key","$k");
                            ?>
                          <div class="form-group">
                            <div class="col-md-12">
                              <strong>Expected Salary</strong>
                            </div>
                            <div class="col-md-9 col-md-9">
                              <input type="text" class="def-input" placeholder="ex_salary" name="ex_salary" value="<?php echo $row[11]; ?>">
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="education col-md-6 col-sm-6 sec-hq-pad-t content-wrap">
                        
                        <div class="form-header">
                          <h4>Education</h4>
                          
                        </div>
                        <?php
                          $row=$con->select_up("candidate_master","serial_key","$k");
                          // echo $row[0];
                          $id=$row[0];
                          $rows=$con->select_up("education_master","cnd_id","$id");
                          //print_r($rows);
                          ?>
                        <div class="form-group">
                          <div class="col-md-12">
                            <strong>Degree</strong>
                          </div>
                          <div class="col-md-12">
                            <input type="text" class="def-input" placeholder="degree" name="degree" value="<?php echo $rows[2]; ?>">
                            <?php if(isset($erdgr)) {echo $erdgr; }?>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <strong>Collage Name</strong>
                          </div>
                          <div class="col-md-12">
                            <input type="text" class="def-input" placeholder="Collage Name" name="clg_name" value="<?php echo $rows[3]; ?>">
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
                            $('#city1').html('<option value="">not selecte sub city</option>');
                            }
                            })
                            });
                            </script>
                            <strong>State</strong>
                          </div>
                          <div class="col-md-12">
                            <select class="def-input" name="state1" id="state1">
                              <option>Select State</option>
                              <?php if(isset($k))
                              { ?>
                              <option>Select State</option>
                              <?php
                              $id=$rows[7];
                              $res=$con->data_dd('state_master');
                              $row_sel=$con->select_up('state_master','state_id',$id);
                              // echo $row_sel[1];
                              while($row_state = mysqli_fetch_array($res))
                              { ?>
                              <option  value="<?php echo $row_state[0]; ?>" <?php if($row_sel[0] == $row_state[0])  {
                                echo "selected" ;
                                } ?>>
                                <?php echo " $row_state[1] "; ?>
                              </option>
                              <?php
                              }
                              }
                              else
                              {
                              ?>
                              <?php
                              $result_select=$con->data_dd("state_master");
                              while($row_state=mysqli_fetch_array($result_select))
                              {
                              echo "<option value='$row_state[0]'> $row_state[1] </option>";
                              }
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
                              <?php if(isset($k))
                              { ?>
                              <option>Select State</option>
                              <?php
                              $id=$rows[7];
                              $res=$con->data_dd('city_master');
                              $row_sel=$con->select_up('city_master','city_id',$id);
                              // echo $row_sel[1];
                              while($row_state = mysqli_fetch_array($res))
                              { ?>
                              <option  value="<?php echo $row_state[0]; ?>" <?php if($row_sel[0] == $row_state[0])  {
                                echo "selected" ;
                                } ?>>
                                <?php echo " $row_state[2] "; ?>
                              </option>
                              <?php
                              }
                              }
                              else
                              {
                              ?>
                              <?php
                              $result_select=$con->data_dd("city_master");
                              while($row_state=mysqli_fetch_array($result_select))
                              {
                              echo "<option value='$row_state[0]'> $row_state[1] </option>";
                              }
                              }
                              ?>
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
                              <option value="<?php echo $i; ?>"<?php if($rows[8]==$i){ echo "selected='selected'";}?>><?php echo $i; ?></option>
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
                              <option value="<?php echo $i; ?>"<?php if($rows[9]==$i){ echo "selected='selected'";}?>><?php echo $i; ?></option>
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
                              <?php if(isset($k))
                              { ?>
                              <option>Select Skill</option>
                              <?php
                              $id=$rows[4];
                              $res=$con->data_dd('role_master');
                              $row_sel=$con->select_up('role_master','r_id',$id);
                              // echo $row_sel[1];
                              while($row_skill = mysqli_fetch_array($res))
                              { ?>
                              <option  value="<?php echo $row_skill[0]; ?>" <?php if($row_sel[0] == $row_skill[0])  {
                                echo "selected" ;
                                } ?>>
                                <?php echo " $row_skill[1] "; ?>
                              </option>
                              <?php
                              }
                              }
                              else
                              {
                              ?>
                              <?php
                              $result_select=$con->data_dd("role_master");
                              while($row_skill=mysqli_fetch_array($result_select))
                              {
                              echo "<option value='$row_skill[0]'> $row_skill[1] </option>";
                              }
                              }
                              ?>
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
                            <strong> Sub Skill </strong>
                            
                          </div>
                          <div class="col-md-12">
                            <select class="def-input" name="ss_name" id="ss_name">
                              <?php if(isset($k))
                              { ?>
                              <option>Select Skill</option>
                              <?php
                              $id=$rows[5];
                              $res=$con->data_dd('subrole_master');
                              $row_sel=$con->select_up('subrole_master','subr_id',$id);
                              // echo $row_sel[1];
                              while($row_skill = mysqli_fetch_array($res))
                              { ?>
                              <option  value="<?php echo $row_skill[0]; ?>" <?php if($row_sel[0] == $row_skill[0])  {
                                echo "selected" ;
                                } ?>>
                                <?php echo " $row_skill[2] "; ?>
                              </option>
                              <?php
                              }
                              }
                              else
                              {
                              ?>
                              <?php
                              $result_select=$con->data_dd("subrole_master");
                              while($row_skill=mysqli_fetch_array($result_select))
                              {
                              echo "<option value='$row_skill[0]'> $row_skill[1] </option>";
                              }
                              }
                              ?>
                              <option>Select Skill</option>
                              <?php
                              $result_select=$con->data_dd("subrole_master");
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
                            <h4>Personal Skill</h4>
                          </div>
                          <div class="col-md-12">
                            <strong>Skill Name</strong>
                          </div>
                          <div class="col-md-12">
                            <input type="text" class="def-input" placeholder="Skill Name" name="extra_skill" value="<?php echo $rows[10]; ?>">
                            <?php if(isset($erskill)) {echo $erskill; }?>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12">
                            <strong>Description</strong>
                          </div>
                          <div class="col-md-12">
                            <textarea class="def-input" placeholder="Skill Name" name="des" rows="2" id="des"> <?php echo $rows[11]; ?></textarea>
                          </div>
                        </div>
                        </div><!--/.education -->
                        <div class="work-exp col-md-6 col-sm-6 sec-hq-pad-t content-wrap">
                          <div class="form-header">
                            <h4>Working Experience</h4>
                            <?php
                            $row=$con->select_up("candidate_master","serial_key","$k");
                            // echo $row[0];
                            $id=$row[0];
                            $rowe=$con->select_up("experience_master","cnd_id","$id");
                            //print_r($rowe);
                            ?>
                          </div>
                          <div class="form-group">
                            <div class="col-md-12">
                              <strong>Company Name</strong>
                            </div>
                            <div class="col-md-12">
                              <input type="text" class="def-input" placeholder="Company Name" name="cmp_name" id="cmp_name" value="<?php echo $rowe[3]; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-12">
                              <strong>Positon</strong>
                            </div>
                            <div class="col-md-12">
                              <input type="text" class="def-input" placeholder="Position" name="Positon" value="<?php echo $rowe[2]; ?>">
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
                              $('#city2').html('<option value="">not selecte sub city</option>');
                              }
                              })
                              });
                              </script>
                              <select class="def-input" name="state2" id="state2">
                                <option>Select State</option>
                                <?php if(isset($k))
                                { ?>
                                <option>Select State</option>
                                <?php
                                $id=$rowe[4];
                                $res=$con->data_dd('state_master');
                                $row_sel=$con->select_up('state_master','state_id',$id);
                                // echo $row_sel[s];
                                while($row_state = mysqli_fetch_array($res))
                                { ?>
                                <option  value="<?php echo $row_state[0]; ?>" <?php if($row_sel[0] == $row_state[0])  {
                                  echo "selected" ;
                                  } ?>>
                                  <?php echo " $row_state[1] "; ?>
                                </option>
                                <?php
                                }
                                }
                                else
                                {
                                ?>
                                <?php
                                $result_select=$con->data_dd("state_master");
                                while($row_state=mysqli_fetch_array($result_select))
                                {
                                echo "<option value='$row_state[0]'> $row_state[1] </option>";
                                }
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
                                <?php if(isset($k))
                                { ?>
                                <?php
                                $id=$rowe[5];
                                $res=$con->data_dd('city_master');
                                $row_sel=$con->select_up('city_master','city_id',$id);
                                // echo $row_sel[1];
                                while($row_state = mysqli_fetch_array($res))
                                { ?>
                                <option  value="<?php echo $row_state[0]; ?>" <?php if($row_sel[0] == $row_state[0])  {
                                  echo "selected" ;
                                  } ?>>
                                  <?php echo " $row_state[2] "; ?>
                                </option>
                                <?php
                                }
                                }
                                else
                                {
                                ?>
                                <?php
                                $result_select=$con->data_dd("city_master");
                                while($row_state=mysqli_fetch_array($result_select))
                                {
                                echo "<option value='$row_state[0]'> $row_state[1] </option>";
                                }
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-12">
                              <strong>Experience Year</strong>
                              
                            </div>
                            <div class="col-md-6 col-sm-6">
                              <select name="exp_year" id="exp_year" class="def-input def-select">
                                <option value="" disabled selected >Experience Year</option>
                                <?php
                                for ($i=0; $i <= 10 ; $i++) {
                                ?>
                                <option value="<?php echo "$i  Year"; ?>"<?php if($rows[6]==$i){ echo "selected='selected'";}?>><?php echo "$i  Year"; ?></option>
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