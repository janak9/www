<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}

if(!isset($_SESSION["c_key"]))
{
header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
    $k=$_SESSION['c_key'];
    include_once("connection.php");
    $con = new JobClass;
    ?>
    <?php include("add_once_head.php");
    $err_img="";
    ?>
    
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
    $('#ss_name').html('<option value="">not selecte sub role</option>');
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
    <!-- <div class="preloader">
      <div class="image-container">
        <div class="image"><img src="assets/images/preloader.gif" alt=""></div>
      </div>
    </div> -->
    <!-- Navbar Start -->
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-bg-white">
      <div class="container">
        <?php include('company_menu.php');
        if(isset($_SESSION['c_key']))
        {
          $k=$_SESSION['c_key'];
          $row=$con->select_up("company_master","serial_key","$k");
          $add=$row['address'];
          if(isset($add))
          {
            ?>
            <script>
            alert('Already Create Your Resume'); 
            window.location.href="profile.php";
           </script>
            <?php
           // header("location:index.php");
          }
        }
        ?>
        
        
        <!-- Banner Grey Starts -->
        <section class="banner-grey">
          <div class="container sec-hq-pad-t sec-hq-pad-b animated wow fadeIn">
            <h2>Company Profile</h2>
          </div>
        </section>
        <?php
        $data_fl="";
        $file_tmp="";
        if(isset($_POST['submit']))
        {
        $k=$_SESSION['c_key'];
        $row=$con->select_up("company_master","serial_key","$k");
        $data="";
        $data["cmp_name"]=$_POST["cmp_name"];
        $data["cmp_size"]=$_POST["cmp_size"];
        $data["gst_no"]=$_POST["gst_no"];
        $data["cmp_phone"]=$_POST["cmp_phone"];
        $data["cmp_webid"]=$_POST["cmp_web"];
        $data["r_id"]=$_POST["s_name"];
        $data["subr_id"]=$_POST["ss_name"];
        $data["address"]=$_POST["address"];
        $data["pincode"]=$_POST["pincode"];
        $data["state_id"]=$_POST["state"];
        $data["city_id"]=$_POST["city"];
        $data["owner_name"]=$_POST["owner_name"];
        $data["owner_email"]=$_POST['owner_email'];
        $file_logo=$_FILES["img"]["tmp_name"];
        $data_fl=$_FILES['img'];
        $data["cmp_logo"]=$con->img_upload($data_fl,"../assets/image/cmp_logo/");
        $file_image=$_FILES["cimg"]["tmp_name"];
        $data_f2=$_FILES['cimg'];
        $data["cmp_img"]=$con->img_upload($data_f2,"../assets/image/cmp_image/");
        //print_r($data);
        $con->updatation('company_master',$data,"cmp_id",$row[0]);
        header("location:profile.php");
        }
        ?>
        <?php
        if(isset($_POST['submit']))
        {
        $ercmpname="";
        $ersize="";
        $ergst="";
        $ercweb="";
        $eradd="";
        $erpin="";
        $erowname="";
        $eremail="";
        if(!preg_match("/^[A-Za-z0-9_ .,:\"\'&]+$/", $_POST["cmp_name"]))
        {
        $ercmpname="<p class='erText'>Enter Name Of Company</p>";
        }
        if(!preg_match("/^\d{1,11}$/", $_POST["cmp_size"]))
        {
        $ersize="<p class='erText'>Company size Must Be In Digits</p>";
        }
        if(!preg_match("/^\d{15}$/", $_POST["gst_no"]))
        {
        $ergst="<p class='erText'>Company GST Number Must Be 15 Digits</p>";
        $match=$con->select_up("company_master","gst_no",$_POST["gst_no"]);
        if(!$match)
        {
        $ergst="<p class='erText'>Company GST Number Must Be 15 And Unicque</p>";
        }
        }
        if(!preg_match("/^\d{10,12}$/", $_POST["cmp_phone"]))
        {
        $ercphone="<p class='erText'>Company Phone Number Must Be In Digits</p>";
        }
        if(!preg_match("/^[a-zA-Z]\w+(\.\w+)*\w+(\.[0-9a-zA-Z+])*\.[a-zA-Z]{2,4}$/", $_POST["cmp_web"]))
        {
        $ercweb="<p class='erText'>Company Web Site Name Must Be In Proper Formate</p>";
        }
        if(!preg_match("/^[A-Za-z0-9_ .,:\"\']+$/", $_POST["address"]))
        {
        $eradd="<p class='erText'>Enter Your Address</p>";
        }
        if(!preg_match("/^\d{6}$/", $_POST["pincode"]))
        {
        $erpin="<p class='erText'>Pin Code Must Be 6 Digits</p>";
        }
        if(!preg_match("/^[A-Za-z0-9_ .,:\"\'&]+$/", $_POST["owner_name"]))
        {
        $erowname="<p class='erText'>Enter Name Of Company</p>";
        }
        if(!preg_match("/^[A-Za-z]\w+(\.\w+)*\@\w{5,10}+(\.[0-9a-zA-Z]+)*\.[A-Za-z]{2,4}$/", $_POST["owner_email"]))
        {
        $eremail="<p class='erText'>Email Id Is Wrong</p>";
        }
        }
        ?>
        
        <!-- Banner Grey Ends -->
        <section class="post-a-job animated wow fadeIn" data-wow-delay="0.2s">
          <div class="container">
            <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
              <div class="sec-h-pad-t sec-h-pad-b col-md-10">
                <div class="title-underlined">
                  <h3>Company Detail</h3>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>Company Name</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                    <!-- <input type="text" class="def-input" placeholder="Your company name"> -->
                    <input type="text" class="def-input" id="cmp_name" placeholder="Enter Company Name...." name="cmp_name">
                    <?php if(isset($ercmpname)) {echo $ercmpname; }?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>Company Size</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                    <input type="text" class="def-input" id="cmp_size" placeholder="Enter Company Size...." name="cmp_size">
                    <?php if(isset($ersize)) {echo $ersize; }?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>GST Number</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                    <input type="text" class="def-input" id="gst_no" placeholder="Enter Gst Number...." name="gst_no">
                    <?php if(isset($ergst)) {echo $ergst; }?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>Company Phone Number</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                    <input type="text" class="def-input" id="cmp_phone" placeholder="Enter Company Phone Number...." name="cmp_phone">
                    <?php if(isset($ercphone)) {echo $ercphone; }?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>Company WebSite</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                    <input type="text" class="def-input" id="cmp_web" placeholder="Enter Company Web Site...." name="cmp_web">
                    <?php if(isset($ercweb)) {echo $ercweb; }?>
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
                    <h4>Address</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                    <textarea class="def-input" rows="3" placeholder="Enter Your Address..." name="address"></textarea>
                    <?php if(isset($eradd)) {echo $eradd; }?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>Pincode</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                    <input type="text" class="def-input" id="pincode" placeholder="Enter Pincode Number...." name="pincode">
                    <?php if(isset($erpin)) {echo $erpin;}?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>State</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                    <select class="def-input" name="state" id="state">
                      <option>Select State</option>
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
                    <select class="def-input" name="city" id="city">
                      <option>Select City</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>Owner Name</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                    <input type="text" class="def-input" id="owner_name" placeholder="Enter Owner Name...." name="owner_name">
                    <?php if(isset($erowname)) {echo $erowname;}?>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-3 col-sm-3">
                    <h4>Owner Email</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                    <input type="email" class="def-input" id="email"  placeholder="Enter Owner Email Id ...." name="owner_email">
                    <?php if(isset($eremail)) {echo $eremail;}?>
                  </div>
                </div>
                <div class="form-group mar-t-20 mar-b-20">
                  <div class="col-md-3 col-sm-3">
                    <h4>Logo &amp; Images</h4>
                  </div>
                  <div class="col-md-9 col-sm-9">
                    <div class="def-btn upload-file-btn">
                      <span><i class="fa fa-upload"></i>&nbsp; Browse Logo</span>
                      <input type="file" id="img" name="img" class="upload"/>
                    </div>
                    <div class="small-desc">
                      Max 20MB
                    </div>
                    <div class="def-btn upload-file-btn">
                      <span><i class="fa fa-upload"></i>&nbsp; Browse Image</span>
                      <input type="file" id="cimg" name="cimg" class="upload"/>
                    </div>
                    <div class="small-desc">
                      Max 20MB
                    </div>
                    <div class="errfont">
                      <?php
                      if($err_img != "") {
                      echo "<p class='erText'>$err_img</p>";
                        }
                      ?>
                    </div>
                  </div>
                </div>
                  <div class="col-md-12 sec-h-pad-t text-right">
                              <input type="submit" name="submit" class="def-btn btn-bg-blue" value="Finish">
                            </div>
                  
                </div>
              </form>
            </div>
            
          </section>
          <!-- Footer Starts -->
          <?php include_once 'footer.php'; ?>
          <!-- Footer Ends -->
          <!-- JavaScripts -->
          <script src="assets/javascripts/bootstrap.min.js"></script>
          <script src="assets/javascripts/wow.min.js"></script>
          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJEWOkg4njiqY71jR-xxs-PnQI9yXaYsQ"></script>
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
        <!-- Mirrored from demo.suavedigital.com/jobstar/post-a-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:28:19 GMT -->
      </html>