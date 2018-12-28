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
    $errole="";
    if(!preg_match("/^[A-Za-z]+$/", $_POST["r_name"]))
    {
      $errole="<p class='erText'>Role Must Be Form Of Text Not Allow Number Or Other Characters</p>";
    }
    else
   {
      $data="";
      $data["state"]=$_POST['r_name'];
      $con->insertion('role_master',$data);
      //header("location:roleInfo.php");
    }
  }
   if(isset($_GET['uid']))
                    {
                     if(isset($_POST['supdate']))
                     {
                      $data["r_name"]=$_POST['r_name'];
                      $id=$_GET['uid'];
                      $r=$con->updatation('role_master',$data,'r_id',$id);
                      header("location:roleInfo.php");
                     }
                   }
  ?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <?php include 'header.php'; ?>
      <?php include 'left_sidebar.php'; ?>
      <!-- Content Wrapper.z Contains page content -->
      <div class="content-wrapper">
        <div class="col-md-12">
          <h2> Skill </h2>
          <div class="text-right">
            <a href="roleInfo.php"><h2><i class="fa fa-hand-o-right"></i></i> <span>show record</span></h2></a>
          </div>
          <?php
          if(isset($_GET['uid'])){
          $id = $_GET['uid'];
          $row_sel=$con->select_up('role_master','r_id',$id);
          }
          ?>
          <form method="post">
            <div class="form-group">
              <label for="role_name">Skill Name </label>
              <input type="text" class="form-control" id="r_name" placeholder="Enter Skill Name...." name="r_name" value=" <?php
          if(isset($_GET['uid'])){ echo $row_sel[1];} ?>">
              <?php if(isset($errole)) {echo $errole; }?>
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