<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}
if(!isset($_SESSION["email"]))
{
header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'add_ons_head.php'; 
	 include_once("connection.php");
    $con = new JobClass;
  ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<?php include 'header.php'; ?>
		<?php include 'left_sidebar.php'; ?>
		<!-- Content Wrapper.z Contains page content -->
  		<div class="content-wrapper">
  			<section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>


  <section class="content">
      <!-- Info boxes -->
  <div class="row">
        <!-- /.col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php $count=$con->counter("company_master","cmp_id"); 
              echo $count; ?></h3>
              <p>Company</p>
            </div>
            <div class="icon">
              <i class="fa fa-industry"></i>
            </div>
            <a href="http://localhost/job180/adminside/companyInfo.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php $count1=$con->counter("candidate_master","cnd_id"); 
              echo $count1; ?></h3>

              <p>User</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="http://localhost/job180/adminside/candidateInfo.php" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php $count2=$con->counter(" jobpost_master","j_id"); 
              echo $count2; ?><sup style="font-size: 20px"></sup></h3>

              <p>Job Post</p>
            </div>
            <div class="icon">
              <i class="fa fa-edit"></i>
            </div>
            <a href="http://localhost/job180/adminside/jobpostInfo.php"" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php $count2=$con->counter("role_master","r_id"); 
              echo $count2; ?><sup style="font-size: 20px"></sup></h3>
              <p>Skill</p>
            </div>
            <div class="icon">
              <i class="fa fa-life-bouy"></i>
            </div>
            <a href="http://localhost/job180/adminside/roleInfo.php"" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>44</h3>
              <p>Visiter</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>

    		
        
    </section>
    </div>
  		<!-- /.content-wrapper -->
		<?php include 'footer.php'; ?>
		<?php include 'right_sidebar.php'; ?>

	</div>
	<!-- ./wrapper -->
	
	<?php include 'add_ons_body.php'; ?>

</body>
</html>