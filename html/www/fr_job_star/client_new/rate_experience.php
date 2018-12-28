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
if(isset($_POST['submit']))
{
  $k=$_SESSION['key'];
  $row=$con->select_up("candidate_master","serial_key","$k");
  $data["cnd_id"]=$row[0];
  $data["cmp"]=$_POST["cmp"];
  $data["job"]=$_POST["job"];
  $data["rate"]=$_POST["my_rating"];
  $data["des"]=$_POST["des"];
  $s=$con->insertion('review',$data); 
  if ($s) {
    echo "<script>alert('Thank You For Giving Review');</script>";
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
  <body>
    <div class="container">
      <!-- Navbar Start -->
      <nav class="navbar navbar-inverse navbar-fixed-top navbar-bg-white">
        <div class="container">
          <?php include('candidate_menu.php');?>
          
          <!-- Banner Grey Starts -->
          <section class="banner-grey">
            <div class="container sec-hq-pad-t sec-hq-pad-b">
              <h2 class="animated wow fadeIn">Rate Your Experience</h2>
            </div>
          </section>
<script type="text/javascript">
  $(document).ready(function()
  {
    $('#cmp').on('change',function()
    {
      var cmp_id=$(this).val();
      if(cmp_id)
      {
        $.ajax
        ({
          type:'post',
          url:'get_job_experience.php',
          data:'cmp_id='+cmp_id,
          success:function(html)
          {
           $('#job').html(html);
          }
        });
      }
      else
      {
        $('#job').html('<option value="" style=" text-transform:capitalize;">not selected Company</option>');
      }
    });
  });
</script>
          <section class="resume-form sec-hq-pad-t sec-hq-pad-b animated wow fadeIn" data-wow-delay="0.2s">
            <div class="form-content">
              <div class="container">
                <?php
                $k=$_SESSION['key'];
                $row=$con->select_up("candidate_master","serial_key","$k");
                ?>
                <form action="#" class="form-horizontal" method="post" enctype="multipart/form-data">
                  <div class="col-md-9 col-sm-9">
                    <div class="form-group">
                        <div class="col-md-12">
                          <strong>Company</strong>
                        </div>
                        <?php
                          $qry="select cmp_id from apply_master where is_approve=1 and cnd_id=".$row[0]." group by cmp_id";
                          $res=mysqli_query($con->con,$qry);
                          $cmp_id=mysqli_fetch_all($res);
                          $cid=array_map(function($index)
                          {
                            return $index[0];
                          }, $cmp_id);
                          $cmp_id=implode(",",$cid);
                          $qry="select * from company_master where cmp_id IN($cmp_id)";
                          $result_select=mysqli_query($con->con,$qry);
                        ?>
                        <div class="col-md-12">
                          <select class="def-input" name="cmp" id="cmp">
                            <option>Select Company</option>
                            <?php
                            while($row=mysqli_fetch_array($result_select))
                            {
                             echo "<option value='$row[0]' style='text-transform:capitalize;'> $row[2] </option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12">
                          <strong>Job</strong>
                        </div>
                        <div class="col-md-12">
                          <select class="def-input" name="job" id="job">
                            <option>Select Job</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-12">
                          <strong>Rate</strong>
                        </div>
                        <div class="col-md-12">
                          <fieldset class="my_rating">
                            <input type="radio" id="star5" name="my_rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                            
                            <input type="radio" id="star4half" name="my_rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                            
                            <input type="radio" id="star4" name="my_rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                            
                            <input type="radio" id="star3half" name="my_rating" value="3.5"/><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                            
                            <input type="radio" id="star3" name="my_rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                            
                            <input type="radio" id="star2half" name="my_rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                            
                            <input type="radio" id="star2" name="my_rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                            
                            <input type="radio" id="star1half" name="my_rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                            
                            <input type="radio" id="star1" name="my_rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                            
                            <input type="radio" id="starhalf" name="my_rating" value="0.5" checked /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars" ></label>
                        </fieldset>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <strong>Description</strong>
                      </div>
                      <div class="col-md-12">
                        <textarea class="def-input" placeholder="Enter Your Experience" name="des" rows="2" id="des" required></textarea>
                      </div>
                    </div>
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