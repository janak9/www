
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
         $id=$_GET['jid'];

         $k=$_SESSION['c_key'];
         $jrow=$con->select_up("company_master","serial_key",$k);

       // $row=$con->select_up("jobpost_master","j_id",$id);
        $data["cmp_id"]=$jrow[0];
        $data["jobtype_id"]=$_POST["jobtype"];
        $data["j_name"]=$_POST["j_name"];
        $data["r_id"]=$_POST["s_name"];
        $data["subr_id"]=$_POST["ss_name"];
        $data["min_sal"]=$_POST["min_salary"];
        $data["max_sal"]=$_POST["max_salary"];
        $data["min_exp"]=$_POST["min_exp"];
        $data["max_exp"]=$_POST["max_exp"];
        $data["state_id"]=$_POST["state"];
        $data["city_id"]=$_POST["city"];
        $data["des"]=$_POST["des"];
        $data["responsive_email"]=$_POST["responsive_email"];
        $data["phone"]=$_POST["phone"];
        $data["updated_date"]=date("Y/m/d");
        //print_r($data);
        $con->updatation('jobpost_master',$data,"j_id",$id);
        header("location:profile.php");

        }
        ?>
        <!-- Banner Grey Ends -->
        <section class="post-a-job animated wow fadeIn" data-wow-delay="0.2s">
          <div class="container">
            <form class="form-horizontal" method="post">
              <div class="sec-h-pad-t sec-h-pad-b col-md-12">
                <div class="title-underlined">
                  <h3>Job Details</h3>
                   <?php
            $id=$_GET['jid'];
            $row=$con->select_up("jobpost_master","j_id",$id);
            //print_r($row);
            ?>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>Job title</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                     <input type="text" class="def-input" placeholder="Short title for your job" name="j_name" value="<?php echo $row[3]; ?>">
                    <?php if(isset($erjname)){echo $erjname;}?>
                  </div>
                </div>
                  
                 <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>Job type</h4>
                   

                  </div>
                  <div class="col-md-9 col-sm-9">
                  <select name="jobtype" id="jobtype" class="def-input def-select">
                    <?php if(isset($_GET["jid"])) 
                    {?>
                      <option value="">Choose Type</option>
                      <?php
                      $id=$_GET["jid"];
                      $r1=$con->select_up("jobpost_master","j_id",$id);
                      $res=$con->data_dd("jobtype_master");
                      while($row=mysqli_fetch_array($res))
                      {?>
                        <option value="<?php echo $row[0]; ?>"
                          <?php 
                          if($r1[2]==$row[0]) 
                          {
                            echo "selected"; 
                          } 
                          ?>>
                          <?php echo $row[1]; ?>
                        </option>
                      <?php
                      }
                    }  
                    else
                    {
                    ?>
                       <option>select Job Type</option>
                        <?php
                        $res_select=$con->data_dd("jobtype_master");
                        while($row=mysqli_fetch_array($res_select))
                        {
                          echo "<option value='$row[0]'> $row[1] </option>";
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div> 
                 <?php $id=$_GET['jid'];
            $row=$con->select_up("jobpost_master","j_id",$id);
            ?>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>Skill</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                    <select class="def-input" name="s_name" id="s_name">
                       <?php if(isset($k))
                        { ?>
                        <option>Select Skill</option>
                        <?php
                        $id=$row[4];
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
                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>Sub Skill</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                      <?php if(isset($k)){ ?>
                      <select class="def-input" name="ss_name" id="ss_name">
                        <option>select Sub skill</option>
                        <?php
                        $id=$row[5];
                        $res=$con->data_dd('subrole_master');
                        $row_sel=$con->select_up('subrole_master','subr_id',$id);
                        while($rrr=mysqli_fetch_array($res))
                        {
                        ?><option <?php if(isset($k)){ if($row[5] == $rrr[0]){ echo "selected=selected";} echo " value='$rrr[0]'>$rrr[2]</option>";
                        }
                        }
                        ?>
                      </select>
                      <?php }  else{ ?>
                      <select class="def-input" name="ss_name" id="ss_name">
                        <option>select Sub skill</option>
                        <?php } ?>
                      </select>
                  </div>
                </div>
               
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>minmam Salary</h4>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <input type="text" name="min_salary" id="min_salary" class="def-input" placeholder="Minimum Salary.." value="<?php echo $row[6]; ?>">
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <h4>maximam salary</h4>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <input type="text" name="max_salary" id="max_salary" class="def-input" placeholder="Maximum Salary.." value="<?php echo $row[7]; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>minmam experiance</h4>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <select name="min_exp" id="min_exp" class="def-input">
                      <option value="" disabled selected>minimam experiance</option>
                      <?php
                      for ($i=1; $i <= 10 ; $i++)
                      {
                      ?>
                     <option value="<?php echo $i; ?>"<?php if($row[8]==$i){ echo "selected='selected'";}?>><?php echo "$i Year"; ?></option>
                      <?php
                      }
                      ?>
                      <option value="more">More</option>
                    </select>
                    <?php if(isset($erminex)) {echo $erminex; }?>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <h4>maximam experiance</h4>
                  </div>
                  <div class="col-md-3 col-sm-3">
                    <select name="max_exp" id="max_exp" class="def-input">
                      <option value="" disabled selected>maximam experiance</option>
                      <?php
                      for ($i=1; $i <= 10 ; $i++)
                      {
                      ?>
                       <option value="<?php echo $i; ?>"<?php if($row[9]==$i){ echo "selected='selected'";}?>><?php echo "$i Year"; ?></option>
                     <!--  <option value="<?php //echo $i; ?>"><?php //echo "$i Year"; ?></option> -->
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
                    <h4>description</h4>
                  </div>
                  <div class="col-md-9 col-sm-9 search-form">
                    <textarea type="text" id="des" placeholder="Enter Description ..." name="des" class="def-input"><?php echo $row[12]; ?></textarea>
                    <?php if(isset($erdes)) {echo $erdes; }?>
                  </div>
                  <div class="form-group">
                     <div class="col-md-3 col-sm-3">
                      <h4> responsive email</h4>
                    </div>
                    <div class="col-md-9 col-sm-9">
                      <input type="text" class="def-input" placeholder=" responsive email" name="responsive_email" value="<?php echo $row[13]; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-3 col-sm-3">
                      <h4> phone</h4>
                    </div>
                    <div class="col-md-9 col-sm-9">
                      <input type="text" class="def-input" placeholder=" phone" name=" phone" value="<?php echo $row[14]; ?>">
                      <?php if(isset($erphone)) {echo $erphone; }?>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-3 col-sm-3">
                      <h4>state </h4>
                    </div>
                    <div class="col-md-9 col-sm-9">
                       <select class="def-input" name="state" id="state">
                       <?php if(isset($k))
                      { ?>
                      <option>Select State</option>
                      <?php
                      $id=$row[10];
                      $res=$con->data_dd('state_master');
                      $row_sel=$con->select_up('state_master','state_id',$id);
                      // echo $row_sel[1];
                      while($row_state = mysqli_fetch_array($res))
                      { ?>
                      <option  value="<?php echo $row_state[0]; ?>" <?php if($row_state[0] == $row[10])  {
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
                  <div class="col-md-3 col-sm-3">
                    <h4>City</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                    <select class="def-input" name="city" id="city">
                      <option>Select City</option>
                      <?php if(isset($k))
                                { ?>
                                <option>Select City</option>
                                <?php
                                $cid=$row[11];
                                $res=$con->data_dd('city_master');
                                $row_selc=$con->select_up('city_master','city_id',$cid);
                                // echo $row_sel[1];
                                while($row_city = mysqli_fetch_array($res))
                                { ?>
                                <option  value="<?php echo $row_city[0]; ?>" <?php if($row_city[0] == $row[11])  {
                                  echo "selected" ;
                                  } ?>>
                                  <?php echo " $row_city[2] "; ?>
                                </option>
                                <?php
                                }
                                }
                                else
                                {
                                ?>
                                <?php
                                $result_city=$con->data_dd("city_master");
                                while($row_city=mysqli_fetch_array($result_city))
                                {
                                echo "<option value='$row_city[0]'> $row_city[1] </option>";
                                }
                                }
                                ?>
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