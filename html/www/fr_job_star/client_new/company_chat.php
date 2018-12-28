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
    <link rel="stylesheet" type="text/css" href="assets/stylesheets/css/chat.css">
  </head>
  <body>
    
    <!-- Navbar Start -->
    <nav class="navbar navbar-inverse navbar-fixed-top navbar-bg-white">
      <div class="container">
        <?php include('company_menu.php');
          $r_id=$_GET['r_id'];
          $k=$_SESSION['c_key'];
          $cmp=$con->select_up("company_master","serial_key","$k");
          //print_r($cmp);
          $cmp_id=$cmp[0];
          $cnd=$con->select_up("candidate_master","cnd_id",$r_id);
          $i = 0;
        ?>
        <!-- Banner Grey Starts -->
        <section class="banner-grey">
          <div class="container sec-hq-pad-t sec-hq-pad-b animated wow fadeIn">
            <div class="photo-wrap valign-middle content-wrap">
              <div class="photo">
                <img src="../assets/image/cnd_image/<?php echo $cnd[12]; ?>" style="border-radius: 40%; height: 90px;">
              </div>
            </div>
            <div class="name valign-middle content-wrap" style="padding-left: 30px;">
              <h4><?php echo "$cnd[2] $cnd[3]"; ?></h4>
            </div>
          </div>
        </section>
        <!-- Banner Grey Ends -->
        <section class="browse-resumes sec-hq-pad-t sec-hq-pad-b" style="padding: 0;">
        <?php 
          $sender="company";
          $reciever="candidate";
          $s_id=$cmp['cmp_id'];
          $qry="select * from chat where reciever='company' and sender='candidate' and s_id=$r_id and r_id=$s_id or reciever='candidate' and sender='company' and s_id=$s_id and r_id=$r_id";
          $res=mysqli_query($con->con,$qry);
        ?>
      <div id="messages" class="messages">
        <ul>
            <?php while($m=mysqli_fetch_array($res)) {
            if($m['sender']=='candidate'){ ?>
            <li>
                <span class="left"><?php echo $m['msg']; }else{ ?> </span>
                <div class="clear"></div>
            </li> 
            <li>
                <span class="right"><?php  echo $m['msg'];}  ?></span>
                <div class="clear"></div>
            </li> <?php } ?>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="input-box">
      <input type="hidden" id="s_id" value="<?php echo $s_id;?>">
      <input type="hidden" id="r_id" value="<?php echo $r_id;?>">
      <input type="hidden" id="type" value="candidate">
        <input type="text" name="mess" id="mess" onKeydown="Javascript: if (event.keyCode==13) fun('<?php echo $sender; ?>','<?php echo $reciever;?>','<?php echo $s_id;?>','<?php echo $r_id;?>',this.value);" placeholder="Enter message">
    </div>
    <script type="text/javascript">
      var elem = document.getElementById('messages');
      elem.scrollTop = elem.scrollHeight;
      $(document).ready(function(){
        setInterval(function(){chat_box()},1000);
      });
    </script>
        </section>
              <!-- Footer Starts -->
              <?php include_once 'footer.php';
              include_once 'add_once_body.php' ; ?>
            </body>
            <!-- Mirrored from demo.suavedigital.com/jobstar/browse-resumes.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 11:27:39 GMT -->
          </html>