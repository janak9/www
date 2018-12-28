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
  if(isset($_POST["sinsert"]))
  {
  $ersrole="";
  if(!preg_match("/^[A-Za-z]+$/", $_POST["subr_name"]))
  {
  $ersrole="<p class='erText'>Role Must Be Form Of Text Not Allow Number Or Other Characters</p>";
  }
  else
  {
  $data="";
  $data["role"]=$_POST["r_name"];
  $data["subrole"]=$_POST["subr_name"];
  $con->insertion('subrole_master',$data);
  }
  }
  if(isset($_GET['uid']))
  {
  if(isset($_POST['supdate']))
  {
  $data="";
  $data["r_id"]=$_POST["r_name"];
  $data["subr_name"]=$_POST["subr_name"];
  
  $id=$_GET['uid'];
  $con->updatation('subrole_master',$data,'subr_id',$id);
  header("location:subroleInfo.php");
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
          <h2> Sub Skill </h2>
          <div class="text-right">
            <a href="subroleInfo.php"><h2><i class="fa fa-hand-o-right"></i></i> <span>show record</span></h2></a>
          </div>
          <?php
          if(isset($_GET['uid'])){
          $id = $_GET['uid'];
          $row=$con->select_up('subrole_master','subr_id',$id);
          }
          ?>
          <form method="post">
            <div class="form-group">
              <label for="r_id">Skill Name </label>
              <select class="form-control" name="r_name">
                <?php if(isset($_GET['uid']))
                { ?>
                <option>Select Skill</option>
                <?php
                $id=$_GET['uid'];
                $res=$con->data_dd('role_master');
                $row_sel=$con->select_up('role_master','r_id',$id);
                // echo $row_sel[1];
                while($row = mysqli_fetch_array($res))
                { ?>
                <option  value="<?php echo $row[0]; ?>" <?php if($row_sel[0] == $row[0])  {
                  echo "selected" ;
                  } ?>>
                  <?php echo " $row[1] "; ?>
                </option>
                <?php
                }
                }
                else
                {
                ?>
                <?php
                $result_select=$con->data_dd("role_master");
                while($row=mysqli_fetch_array($result_select))
                {
                echo "<option value='$row[0]'> $row[1] </option>";
                }
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="subr_name">Sub Skill Name </label>
              <input type="text" class="form-control" id="subr_name" placeholder="Enter Sub Skill Name...." name="subr_name" value="<?php if(isset($_GET['uid'])){ echo $row_sel[2]; } ?>">
              <?php if(isset($ersrole)) {echo $ersrole; }?>
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
    <!-- ./wrapper -->
    <?php include 'add_ons_body.php'; ?>
  </body>
</html>