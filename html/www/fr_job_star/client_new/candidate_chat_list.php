<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
$k=$_SESSION['key'];
}
if(!isset($_SESSION["key"]))
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
        <?php include('candidate_menu.php');?>
        <!-- Banner Grey Starts -->
        <section class="banner-grey">
          <div class="container sec-hq-pad-t sec-hq-pad-b animated wow fadeIn">
            <h2>Chat List</h2>
          </div>
        </section>
        <!-- Banner Grey Ends -->
        <section class="browse-resumes sec-hq-pad-t sec-hq-pad-b">
          <div class="container">
              <div class="resume-list-container sec-h-pad-t animated wow fadeIn" data-wow-delay="0.2s">
                <?php
                $k=$_SESSION['key'];
                $cnd=$con->select_up("candidate_master","serial_key","$k");
                //print_r($cmp);
                $cnd_id=$cnd[0];
                $i = 0;
                $sql_app="select * from (select * from chat where reciever='candidate' and r_id=$cnd_id order by id DESC) AS tmp group by s_id order by id DESC";
                $res=mysqli_query($connection,$sql_app);
                $recieve_arr=mysqli_fetch_all($res,MYSQLI_ASSOC);
                $in_qry="select s_id from (select * from chat where reciever='candidate' and r_id=$cnd_id order by id DESC) AS tmp group by s_id order by id DESC";
                $in_res=mysqli_query($con->con,$in_qry);
                if ($in_res && mysqli_num_rows($in_res)>0) {
                  $in_arr=mysqli_fetch_all($in_res,MYSQLI_NUM);
                  $in_arr=array_map(function($index){
                  return $index[0];
                  },$in_arr);
                  $in_str=implode(",",$in_arr);
                  $up_qry="select * from (select * from chat where sender='candidate' and s_id=$cnd_id order by id DESC) AS tmp where r_id NOT IN($in_str) group by r_id order by id DESC ";
                }else{
                  $up_qry="select * from (select * from chat where sender='candidate' and s_id=$cnd_id order by id DESC) AS tmp group by r_id order by id DESC ";
                }
                $send_res=mysqli_query($con->con,$up_qry);
                if ($send_res && mysqli_num_rows($send_res)>0) {
                    $send_arr=mysqli_fetch_all($send_res,MYSQLI_ASSOC);
                    $mrg_arr=array_merge($recieve_arr,$send_arr);
                    $mrg_arr_sort = array();
                    foreach ($mrg_arr as $key => $row)
                    {
                        $mrg_arr_sort[$key] = $row['id'];
                    }
                    array_multisort($mrg_arr_sort, SORT_DESC, $mrg_arr);
                  }else{
                    $mrg_arr=$recieve_arr;
                  }
                
                //$res=$con->select_mul("apply_master","cmp_id","$cmp_id");
                //while($row=mysqli_fetch_array($res))
                foreach ($mrg_arr as $row)
                { 
                  if ($row['sender']=='company') {
                    $tmp_id='s_id';
                  }
                  if ($row['reciever']=='company') {
                    $tmp_id='r_id';
                  }
                $cmp=$con->select_up("company_master","cmp_id",$row[$tmp_id]);
                ?>
                <a href="candidate_chat.php?&r_id=<?php echo $row[$tmp_id];?>">
                  <div class="resume-list valign-wrap">
                    <div class="photo-wrap valign-middle content-wrap">
                      <div class="photo">
                        <img src="../assets/image/cmp_logo/<?php echo $cmp['cmp_logo']; ?>" style="border-radius: 40%; height: 90px;">
                      </div>
                    </div>
                    <div class="name valign-middle content-wrap">
                      <h4><?php echo $cmp['cmp_name']; ?></h4>
                      <p><span><?php echo $row['msg'];?></span></p>
                    </div>
                  </div><!--/.job-list --></a>
                  <?php
                  }
                  ?>
              </div><!--/.job-list-container -->
              </section>
              <!-- Footer Starts -->
              <?php include_once 'footer.php';
              include_once 'add_once_body.php' ; ?>
            </body>
            <!-- Mirrored from demo.suavedigital.com/jobstar/browse-resumes.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:39 GMT -->
          </html>