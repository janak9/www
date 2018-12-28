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
    $val="";
    $u=$_SESSION['email'];
    $row=$con->select_up("adminlogin","ad_email","$u");
    //print_r($row);
    ?>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    
    <div class="wrapper">
      <?php include 'header.php'; ?>
      <?php include 'left_sidebar.php'; ?>
      <!-- Content Wrapper.z Contains page content -->
      <div class="content-wrapper">
      <div class="col-md-12 col-sm-12" style="margin: auto; text-align: center">
        <h2> Profile </h2>
          <div style="align-self: center;" id="div1">
            <div class="box box-primary" style="width: 50%; margin-right: 40%; margin-left: 25%">
              <form method="post">
                <br>
                <div>
                  <img src="assets/image/profile/<?php echo $row[3];?>" height='100px' width='100px'>
                </div>
                <div class="form-group">
                  <label for="user_id" style="font-size: 20px;">User Name :  </label>
                  <?php echo $row[1]; ?>
                </div>
                <div class="form-group">
                  <label for="email_id" style="font-size: 20px;">Email : </label>
                  <?php echo $row[2]; ?>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    <!-- /.content-wrapper -->
    <?php include 'footer.php'; ?>
    <?php include 'right_sidebar.php'; ?>
  </div>
  <!-- ./wrapper -->
  
  <?php include 'add_ons_body.php'; ?>
</body>
</html>