<?php 
ob_start();
if(isset($_SESSION['c_key'])){
$k=$_SESSION['c_key'];
$cmp=$con->select_up("company_master","serial_key",$k);
$cmpid=$cmp[0];
$connection = mysqli_connect("localhost","root","","job180") or die(mysql_error());
}
?>
<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"></a>
    </div><!--/.navbar-header -->
    <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="index.php"> Home</a>
          </li>
            <li><a href="profile.php">Profile</a></li>
          <li class="dropdown">
           
            <a href="#" data-toggle="dropdown" class="dropdown-toggle">  Jobs <b class="caret"></b></a>
            <ul class="dropdown-menu">
               
              <li><a href="post_a_job.php">Post A Job</a></li>
              
             <!--  <li><a href="job_alert_list.php">Job Alert</a></li> -->
            </ul>
          </li>
           <?php  
              $sql_sql="select * from (select * from chat where reciever='company' and r_id=$cmpid order by id DESC) AS tmp where tmp.read=0 group by s_id";
              $res_sel=mysqli_query($connection,$sql_sql);
              $cou=mysqli_num_rows($res_sel);
              ?>
          <li>
            <a href="company_chat_list.php">Chat <span class="label label-warning" style="color: red; font-size: 15px"><?php if($cou>0){ echo $cou;  } ?></span></a>
          </li>
           <?php  
              $sql_sql="select * from apply_master where is_approve=0 and cmp_id=$cmpid";
              $res_sel=mysqli_query($connection,$sql_sql);
              $cou=mysqli_num_rows($res_sel);
              ?>
          <li>
            <a href="user_post.php">User Post <span class="label label-warning" style="color: red; font-size: 15px"><?php if($cou>0){ echo $cou;  } ?></span></a>
          </li>
          <li> <a href="approved.php">approved</a></li>
          <li class="dropdown">
            <?php 
              $cmp=$con->select_up("company_master","serial_key",$k);
            ?>
            <a href="profile.php" data-toggle="dropdown" class="dropdown-toggle"><?php echo $cmp['cmp_name']; ?><b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="Company_profile.php">Create Profile</a></li>
              <li><a href="update_profile.php">Update Profile</a></li>
              <li><a href="cmp_change_password.php">Change Password</a></li>
            </ul>
          </li>     
               <!-- <li><a href="faq.php">FAQ</a></li>
          <li><a href="contact.php">Contact</a></li> -->
          <?php
          if(!isset($_SESSION['c_key']))
          {
          ?>
          <li><a href="#" class="login-nav" data-toggle="modal" data-target="#LogIn">Sign in</a></li>
          <li><a href="#" class="register" data-toggle="modal" data-target="#Register">Register</a></li>
          <?php }
          else
          {
          ?>
          <li><a href="logout.php" class="register"  data-target="">Logout</a></li>
          <?php } ?>
        </ul>
    </div><!--/ Collapse -->
  </div>
</nav>