<?php
ob_start();
if(isset($_SESSION['key']))
{
$fname="";
$k=$_SESSION['key'];
$cnd=$con->select_up("candidate_master","serial_key",$k);
//print_r($cnd);
$cndid=$cnd[0];
$f=$cnd['f_name'];
$fname=strtoupper($f);
}
$connection = mysqli_connect("localhost","root","","job180") or die(mysql_error());
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
      <li><a href="candidate_profile.php">Profile</a></li>
      <li class="dropdown">
        <a href="#jobs" data-toggle="dropdown" class="dropdown-toggle">Search Jobs <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="job_search2.php">Job Search</a></li>
          <!-- <li><a href="job_details.php">Job Details</a></li> -->
          <li><a href="company_directory.php">Company By Directory</a></li>
          <li><a href="vacancy_by_special.php">Vacancy By Specialization</a></li>
          <!-- <li><a href="post_a_job.php">Post A Job</a></li>
          <li><a href="job_alert_list.php">Job Alert</a></li>
          <li><a href="my_bookmark.html">My Bookmark</a></li> -->
        </ul>
      </li>
      <li><a href="applied_job.php">APPLIED JOB</a></li>
      <?php  
              $sql_sql="select * from (select * from chat where reciever='candidate' and r_id=$cndid order by id DESC) AS tmp where tmp.read=0 group by s_id";
              $res_sel=mysqli_query($connection,$sql_sql);
              $cou=mysqli_num_rows($res_sel);
              ?>
          <li>
            <a href="candidate_chat_list.php">Chat <span class="label label-warning" style="color: red; font-size: 15px"><?php if($cou>0){ echo $cou;  } ?></span></a>
          </li>
      <?php
      $sql_sel="select * from apply_master where is_read=1 and (is_approve=1 or is_approve=2 or is_approve=3) and cnd_id = $cndid";
      $res_sel=mysqli_query($connection,$sql_sel);
      $cou=mysqli_num_rows($res_sel);
      ?>
      <li class="dropdown">
        <a href="" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-user"></i>&nbsp;<?php  echo "$cnd[2] $cnd[3]"; ?>&nbsp;<b class="caret"></b> </a>
        <ul class="dropdown-menu">
          <li><a href="create_resume.php">Create Resume </a></li>
          <li><a href="update_resume.php">Update Resume </a></li>
          <li><a href="Change_password.php">Change Passsword </a></li>
          <li><a href="rate_experience.php">Rate Your Experience</a></li>
        </ul>
      </li>
      <li><a href="company_notification.php"><i class="fa fa-bell-o" style="font-size: 15px;"></i>
        <span class="label label-warning" style="color: red; font-size: 10px"><?php if($cou>0){ echo $cou; } ?></span>
      </a></li>
      <?php
      if(isset($_SESSION['key']))
      {
      $fname="";
      $k=$_SESSION['key'];
      $cnd=$con->select_up("candidate_master","serial_key",$k);
      //print_r($cnd);
      }
      ?>

      
      <?php
      if(!isset($_SESSION['key']))
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
</div>
</div>