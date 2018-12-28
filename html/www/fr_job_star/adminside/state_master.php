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
if(isset($_POST["sinsert"]))
{
  $erst="";
  if(!preg_match("/^[A-Za-z]+$/", $_POST["state"]))
  {
    $erst="<p class='erText'>State Must Be Form Of Text Not Allow Number Or Other Characters</p>";
  }
}

                  if(isset($_POST['sinsert']))
                     {
                      $erst="";
                      $data="";                      
                      if(!preg_match("/^[A-Za-z]+$/", $_POST["state"]))
                      {
                        $erst="<p class='erText'>State Must Be Form Of Text Not Allow Number Or Other Characters</p>";
                      }
                      else
                      {
                        $data["state"]=$_POST['state'];
                        $con->insertion('state_master',$data);
                      }  
                     }  
                    ?>
                    <?php 
                    if(isset($_GET['uid']))
                    {
                     if(isset($_POST['supdate']))
                     {
                      $data["state_name"]=$_POST['state'];
                      $id=$_GET['uid'];
                      $r=$con->updatation('state_master',$data,'state_id',$id);
                      header("location:stateInfo.php");
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
          <h2> State </h2>
          <div class="text-right">
            <a href="stateInfo.php"><h2><i class="fa fa-hand-o-right"></i></i> <span>show record</span></h2></a>
          </div>  
        <?php
        if(isset($_GET['uid'])){ 
          $id=$_GET['uid'];
          $row_sel=$con->select_up('state_master','state_id',$id);
        }
          ?>
         
            <form method="post">
              <div class="form-group">
                <label for="state_name">State Name </label>
                <input type="text" class="form-control" id="state" placeholder="Enter State Name...." name="state" value="<?php if(isset($_GET['uid'])){ echo $row_sel[1]; } ?>">
                <?php if(isset($erst)) {echo $erst; }?>
              </div>
              <div class="form-group">
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
  <?php include('add_ons_body.php');?>
  <!-- ./wrapper -->
</body>
</html>
