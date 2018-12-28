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
    <?php include 'add_ons_head.php'; ?>
    <?php
    include_once("connection.php");
    $con = new JobClass;
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
  </head>
  <?php
  if(isset($_POST['sinsert']))
  {
  $erdes="";
  $ertype="";
  //$erkey="";
  if(!preg_match("/^[A-Za-z ]+$/", $_POST["type_name"]))
  {
  $ertype="<p class='erText'>Enter Type Name</p>";
  }
  /*if(!preg_match("/^[0-9]+$/", $_POST["comman_key"]))
  {
  $erkey="<p class='erText'>Enter Comman Type Key In Digits</p>";
  }*/
  if(!preg_match("/^[A-Za-z0-9_ .,:\"\'&]+$/", $_POST["description"]))
  {
  $erdes="<p class='erText'>Enter Description</p>";
  }
  $data="";
  $data["name"]=$_POST["type_name"];
  $data["des"]=$_POST["description"];
  $con->insertion("jobtype_master",$data);
  }
  if(isset($_GET['uid']))
  {
  if(isset($_POST['supdate']))
  {
  $data="";
  $data["jtype_name"]=$_POST["type_name"];
  $data["des"]=$_POST["description"];
  $id=$_GET['uid'];
  $con->updatation('jobtype_master',$data,'jtype_id',$id);
  header("location:jobtypeInfo.php");
  }
  }
  ?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include 'header.php'; ?>
      <?php include 'left_sidebar.php'; ?>
      
      <!-- Content Wrapper.z Contains page content -->
      <div class="content-wrapper" style="height: 1300px">
        <div class="col-md-12">
          <h2> Job Type</h2>
          <div class="text-right">
            <a href="jobtypeInfo.php"><h2><i class="fa fa-hand-o-right"></i></i> <span>show record</span></h2></a>
          </div>
          <?php
          if(isset($_GET['uid'])){
          $id = $_GET['uid'];
          $row_sel=$con->select_up('jobtype_master','jtype_id',$id);
          }
          ?>
          <form method="post">
            <div class="form-group">
              <label for="type_name">Type Name</label>
              <input type="text" class="form-control" id="type_name" placeholder="Enter Type Name...." name="type_name" value="<?php if(isset($_GET['uid'])){ echo $row_sel[1]; } ?>">
              <?php if(isset($ertype)) {echo $ertype; }?>
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" id="description" placeholder="Enter Description...." name="description" value="<?php if(isset($_GET['uid'])){ echo $row_sel[2]; } ?>">
              <?php if(isset($erdes)) {echo $erdes; }?>
            </div>
            <div>
               <?php
              if(isset($_GET['uid'])){
              //echo $_GET['uid'];
              ?>
              <input type="submit" class="btn btn-default" name="supdate" value="Update"><br><br>
              <?php
              }
              else
              {
              ?>
              <input type="submit" class="btn btn-default" name="sinsert"><br><br>
              <?php
              }
              ?>
            </div>
          </form>
          
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