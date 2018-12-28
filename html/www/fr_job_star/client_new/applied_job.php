<?php
    if (session_status() == PHP_SESSION_NONE) 
    {
        session_start(); 
        $k=$_SESSION['key'];
    }
if(!isset($_SESSION["key"]))
  {
    header("location:index.php");
  }
    ?>
<?php
include_once("connection.php");
$con = new JobClass;
$connection = mysqli_connect("localhost","root","","job180") or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demo.suavedigital.com/jobstar/browse-resumes.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:39 GMT -->
<head>
   <?php include_once("add_once_head.php"); ?>
   
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
  </head>
+
  <body>
<!--     <div class="preloader">
      <div class="image-container">
        <div class="image"><img src="assets/images/preloader.gif" alt=""></div>
      </div>      
    </div> -->
    
      <!-- Navbar Start -->
      <nav class="navbar navbar-inverse navbar-fixed-top navbar-bg-white">
        <div class="container">
            <?php include('candidate_menu.php');?>
    <!-- Banner Grey Starts -->
    <section class="banner-grey">
      <div class="container sec-hq-pad-t sec-hq-pad-b animated wow fadeIn">
        <h2>Jobs for You</h2>
      </div>
    </section>
    <!-- Banner Grey Ends -->
    
    <br>
    <div class="tab">
    <div class="container">
  <button class="tablinks" onclick="opentab(event, 'Matched')">Matched</button>
  <!-- <button class="tablinks" onclick="opentab(event, 'Suggested')">Suggested</button>
  <button class="tablinks" onclick="opentab(event, 'Saved')">Saved</button> -->
  <button class="tablinks" onclick="opentab(event, 'Applied')">Applied</button>
</div>
</div>


<div id="Suggested" class="tabcontent">
  <h3>Suggested</h3>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Saved" class="tabcontent">
  <h3>Saved</h3>
  <p>Tokyo is the capital of Japan.</p>
</div>
    <?php
      if(isset($_GET['did']))
      {
        $id=$_GET['did'];
        $con->deletion("apply_master","ap_id",$id);
        header("location:applied_job.php?delete=deleted");
      }
    ?>
      <div class="container">
     <section class="justify-content-between tabcontent"  id="Matched" >
      <div class="job-list-container sec-q-pad-t">
        <?php 
         $k=$_SESSION['key'];
          $cnd=$con->select_up("candidate_master","serial_key",$k);
          $cnd_id=$cnd['cnd_id'];
          $state=$cnd['state_id'];
          $city=$cnd['city_id'];
          $edu=$con->select_up("education_master","cnd_id",$cnd_id);
          $r_id=$edu['r_id'];
          $subr_id=$edu['subr_id'];
          $job_type=$cnd['jobtype_id'];
          $sel_cnd="select * from jobpost_master where r_id=$r_id and state_id=$state and jobtype_id=$job_type";
          $res_cnd=mysqli_query($connection,$sel_cnd);
          $count_row=mysqli_num_rows($res_cnd);
          if($count_row==0)
          {
            echo "<p style='color:red;margin-left:39%;font-size: 25px;'>Match Not Found</p>";
          }

          while($row_job=mysqli_fetch_array($res_cnd))
          {
            $cmp_id=$row_job['cmp_id'];
             $cmp=$con->select_up("company_master","cmp_id",$cmp_id);
             $st=$con->select_up("state_master","state_id","$row_job[10]");
            $ct=$con->select_up("city_master","city_id","$row_job[11]");
            $jobtype=$con->select_up("jobtype_master","jtype_id",$row_job[2]);
            $name=$jobtype['jtype_name'];
                    $str=str_replace(" ", "", $name);
                    $new_str=strtolower($str);  
        ?>
          <a href="job-details.html">
            <div class="job-list valign-wrap">
              <div class="company-logo valign-middle content-wrap">
                <img src="../assets/image/cmp_logo/<?php echo $cmp[15]; ?>" hight="100px" width="100px" alt="">
              </div>
              <div class="company-name valign-middle content-wrap">
                <h4><?php echo $cmp['cmp_name']; ?></h4>
                <p><?php echo $row_job['j_name']; ?></p>
              </div>
              <div class="location valign-middle content-wrap">
                <i class="fa fa-map-marker"></i> &nbsp; <?php echo $st['state_name'];?>, <?php echo $ct['city_name']; ?>
              </div>
              <div class="job-type <?php echo $new_str; ?> valign-middle content-wrap">
                <span><?php echo $jobtype['jtype_name']; ?></span>
              </div>
              <div class="exp-salary valign-middle content-wrap">
                <h4><?php echo $row_job['min_sal'] ?> - <?php echo $row_job['max_sal'] ?></h4>
              </div>
            </div><!--/.job-list -->
          </a>
          <?php 
          }
          ?>
        </div>
      </section>
    </div><!--/.job-list-container -->
    <div class="container">
    <section class="browse-resumes sec-hq-pad-t sec-hq-pad-b  tabcontent" id="Applied">
         <div class="resume-list-container sec-h-pad-t">
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
          $k=$_SESSION['key'];
          $cnd=$con->select_up("candidate_master","serial_key",$k);
          $cnd_id=$cnd['cnd_id'];
          $sql_apply="select * from apply_master where cnd_id=$cnd_id order BY ap_id DESC";
          $ap_sql=mysqli_query($connection,$sql_apply);
         // $ap_sql=$con->select_desc("apply_master","cnd_id",$cnd_id,"ap_id");
          while($apply_row=mysqli_fetch_array($ap_sql))
          {
            $cmp_id=$apply_row['cmp_id'];
            $cmp=$con->select_up("company_master","cmp_id",$cmp_id);
            $j_id=$apply_row['j_id'];
            $job_post=$con->select_up("jobpost_master","j_id",$j_id);
            //$subrole=$con->select_up("subrole_master","subr_id",$job_post['subr_id']);
            $state=$con->select_up("state_master","state_id","$job_post[10]");
            $city=$con->select_up("city_master","city_id","$job_post[11]");
            
            
              if($apply_row['is_approve']==0 or $apply_row['is_approve']==1)
              {
            ?>
                <a href="job_details.php?cid=<?php echo $cmp_id;?>&jid=<?php echo $j_id ;?>">
                <div class="resume-list valign-wrap">
                  <div class="photo-wrap valign-middle content-wrap">
                    <div class="photo">
                      <img src="../assets/image/cmp_logo/<?php echo $cmp[15]; ?>" style="border-radius: 40%; height: 90px;">
                    </div>
                  </div>
                  <div class="name valign-middle content-wrap">
                    <h4><?php echo $cmp[2]; ?> </h4>
                    <p><span> You Applied In - <?php echo $job_post['j_name']; ?></span> </p>
                  </div>
                  <div class="location valign-middle content-wrap">
                    <i class="fa fa-map-marker"></i> &nbsp; <?php echo "$state[1], $city[2]"; ?>
                  </div>
                </div><!--/.job-list -->
              </a>
              <div class="exp-salary valign-middle content-wrap col-sm-2">
                <a href='?did=<?php echo $apply_row[0]; ?>' class='def-btn btn-bg-yellow' onClick="return confirm('Are you sure to delete??');"> Delete</a>
                    <!-- <a href="applied_job.php?did=<?php// echo $cnd_id; ?>" class="def-btn btn-bg-yellow" onClick=\"return confirm('Are you sure to delete??');\">Delete</a> -->
                  </div> 
              <?php
            }
          }
          ?>
        </div><!--/.job-list-container --> 
        

    </section>
      </div>
    <br>
    <!-- Footer Starts -->
    <?php include_once 'footer.php';
    include_once 'add_once_body.php' ; ?>
  </body>
<script>
function opentab(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
<script  type="text/javascript">
    
$(document).ready(function(){
    $("#txt_search").keyup(function(){
        var searchChar = $(this).val().toUpperCase().replace(/\/|,/g,'');
        var serchLength = searchChar.length;
        $('#bill-list-data .row').each(function(){
            $row = $(this);
            alert('')
            var fullText = $row.find("span").text().toUpperCase().replace(/\/|,/g,'');
            //console.log(fullText);
            //console.log($("fullText:contains(searchChar)"));
            if(fullText.indexOf(searchChar) != -1){
                $row.show();
            }
            else {
                $row.hide();
            }
        });
    });
});
</script>

<!-- Mirrored from demo.suavedigital.com/jobstar/browse-resumes.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:39 GMT -->
</html>