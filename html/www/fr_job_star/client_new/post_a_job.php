<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
$k=$_SESSION["c_key"];
}
if(!isset($_SESSION["c_key"]))
{
header("location:index.php");
}

$con=mysqli_connect("localhost","root","","job180") or die(mysql_error());
// $k=$_SESSION['c_key'];
include_once("connection.php");
$con = new JobClass;

$key=$_SESSION['c_key'];
$cmp_row=$con->select_up("company_master","serial_key","$k");
$cmp_webid=$cmp_row['cmp_webid'];
if(!isset($cmp_webid))
{ 
  ?>
  <script>
    alert('Firest Create Your Profile'); 
    window.location.href="index.php";
   </script>
  <?php
}

?>
<!DOCTYPE html>
<html lang="en">
  
  <!-- Mirrored from demo.suavedigital.com/jobstar/post-a-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:28:19 GMT -->
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
    <script src="jquery-1.11.3.js" type="text/javascript"></script>
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
    $('#ss_name').html('<option value="">not selecte sub Skill</option>');
    }
    });
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
  
  <body>
    
    
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-bg-white">
      <div class="container">
        <?php include('company_menu.php');?>
        
        <!-- Banner Grey Starts -->
        <section class="banner-grey">
          <div class="container sec-hq-pad-t sec-hq-pad-b animated wow fadeIn">
            <h2>Post a Job</h2>
          </div>
        </section>
        <?php
        if(isset($_POST['sinsert']))
        {
        $k=$_SESSION['c_key'];
         $row=$con->select_up("company_master","serial_key","$k");
        //echo $row[0];
          //echo  $_POST["min_exp"];
        $erjname="";
        $ermins="";
        $ermaxs="";
        $erminex="";
        $ermaxex="";
        $erdes="";
        $erphone="";
        if(!preg_match("/^[A-Za-z_ .,:\"\'&]+$/", $_POST["j_name"]))
        {
        $erjname="<p class='erText'>Enter Name Of Job</p>";
        }
        if(!preg_match("/^[0-9]+$/", $_POST["min_salary"]))
        {
        $ermins="<p class='erText'>Enter Minimum Salary</p>";
        }
        if(!preg_match("/^[0-9]+$/", $_POST["max_salary"]))
        {
        $ermaxs="<p class='erText'>Enter Maximum Salary</p>";
        }
      
        if(!preg_match("/^[A-Za-z0-9_ .,:\"\'&]+$/", $_POST["des"]))
        {
        $erdes="<p class='erText'>Enter Description</p>";
        }
        if(!preg_match("/^\d{10,12}$/", $_POST["phone"]))
        {
        $erphone="<p class='erText'>Enter Phone Number Must Be In Digits</p>";
        }
        else
        {
        $data["cmp_id"]=$row[0];
        $data["jobtype"]=$_POST["jobtype"];
         $data["jname"]=$_POST["j_name"];
        $data["rid"]=$_POST["s_name"];
        $data["subr"]=$_POST["ss_name"];
        $data["minsal"]=$_POST["min_salary"];
        $data["maxsal"]=$_POST["max_salary"];
        $data["minexp"]=$_POST["min_exp"];
        $data["maxexp"]=$_POST["max_exp"];
        $data["state"]=$_POST["state"];
        $data["city"]=$_POST["city"];
        $data["des"]=$_POST["des"];
        $data["responsise_email"]=$_POST["responsive_email"];
        $data["phone"]=$_POST["phone"];
        $data["created_date"]=date("Y/m/d");
        $data["updated_date"]=date("Y/m/d");
        //print_r($data);
        $con->insertion('jobpost_master',$data);
        }
        

        }
        ?>
        <!-- Banner Grey Ends -->
        <section class="post-a-job animated wow fadeIn" data-wow-delay="0.2s">
          <div class="container">
            <form class="form-horizontal" method="post">
              <div class="sec-h-pad-t sec-h-pad-b col-md-12">
                <div class="title-underlined">
                  <h3>Job Details</h3>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>Job title</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                    <input type="text" class="def-input" placeholder="Short title for your job" name="j_name">
                    <?php if(isset($erjname)){echo $erjname;}?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>Job Type</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                    <select name="jobtype" id="jobtype" class="def-input">
                      <option value="">Choose Type</option>
                      <?php
                      $job_select=$con->data_dd("jobtype_master");
                      while($row=mysqli_fetch_array($job_select))
                      {
                      echo "<option value='$row[0]'> $row[1] </option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>Skill</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                    <select class="def-input" name="s_name" id="s_name">
                      <option>Select Skill</option>
                      <?php
                      $skill_select=$con->data_dd("role_master");
                      while($row1=mysqli_fetch_array($skill_select))
                      {
                      echo "<option value='$row1[0]'> $row1[1] </option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>Sub Skill</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                    <select class="def-input" name="ss_name" id="ss_name">
                      <option>Select Sub Skill</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>minmam Salary</h4>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <input type="text" name="min_salary" id="min_salary" class="def-input" placeholder="Minimum Salary..">
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <h4>maximam salary</h4>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <input type="text" name="max_salary" id="max_salary" class="def-input" placeholder="Maximum Salary..">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>minimum experiance</h4>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <select name="min_exp" id="min_exp" class="def-input">
                      <option value="" disabled selected>minimum experiance</option>
                      <?php
                      for ($i=0; $i <= 10 ; $i++)
                      {
                      ?>
                      <option value="<?php echo $i; ?>"><?php echo "$i Year"; ?></option>
                      <?php
                      }
                      ?>
                      <option value="more">More</option>
                    </select>
                    <?php if(isset($erminex)) {echo $erminex; }?>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <h4>maximum experiance</h4>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <select name="max_exp" id="max_exp" class="def-input">
                      <option value="" disabled selected>maximum experiance</option>
                      <?php
                      for ($i=0; $i <= 10 ; $i++)
                      {
                      ?>
                      <option value="<?php echo $i; ?>"><?php echo "$i Year"; ?></option>
                      <?php
                      }
                      ?>
                      <option value="more">More</option>
                    </select>
                    <?php if(isset($ermaxex)) {echo $ermaxex; }?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>Description</h4>
                  </div>
                  <div class="col-md-9 col-sm-9 search-form">
                    <textarea type="text" id="des" placeholder="Enter Description ..." name="des" class="def-input"></textarea>
                    <?php if(isset($erdes)) {echo $erdes; }?>
                  </div>
                  <div class="form-group">
                     <div class="col-md-3 col-sm-3">
                      <h4> Responsive email</h4>
                    </div>
                    <div class="col-md-9 col-sm-9">
                      <input type="text" class="def-input" placeholder=" responsive email" name="responsive_email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-3 col-sm-3">
                      <h4> phone</h4>
                    </div>
                    <div class="col-md-9 col-sm-9">
                      <input type="text" class="def-input" placeholder=" phone" name=" phone">
                      <?php if(isset($erphone)) {echo $erphone; }?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-3 col-sm-3">
                      <h4>State </h4>
                    </div>
                    <div class="col-md-9 col-sm-9">
                      <select name="state" id="state" class="def-input">
                        <option value="" selected disabled>state</option>
                        <?php
                        $result_select=$con->data_dd("state_master");
                        while($row=mysqli_fetch_array($result_select))
                        {
                        echo "<option value='$row[0]'> $row[1] </option>";
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-3 col-sm-3">
                      <h4>City</h4>
                    </div>
                    <div class="col-md-9 col-sm-9">
                      <select name="city" id="city" class="def-input">
                        <option value="" selected disabled>city</option>
                        
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-12 text-right">
                      <input type="submit" name="sinsert" value="Submit" class="def-btn btn-bg-blue">
                    </div>
                  </div>
                </form>
              </div>
            </section>
            <!-- Footer Starts -->
            <?php include_once 'footer.php'; ?>
            <?php include_once 'add_once_body.php';  ?>
            <!-- Footer Ends -->
            <!-- JavaScripts -->
          </body>
        </html>