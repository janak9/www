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
    $val="";
    ?><style type="text/css">
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
  $erct="";
  if(!preg_match("/^[A-Za-z ]+$/", $_POST["city_name"]))
  {
  $erct="<p class='erText'>City Must Be Form Of Text Not Allow Number Or Other Characters</p>";
  }
  }
  ?>
  <?php
  if(isset($_POST['sinsert']))
  {
  
  $data="";
  $data["state"]=$_POST["state_name"];
  $data["city"]=$_POST["city_name"];
  $con->insertion('city_master',$data);
  }
  if(isset($_GET['uid']))
  {
  if(isset($_POST['supdate']))
  {
  $data="";
  $data["state_id"]=$_POST["state_name"];
  $data["city_name"]=$_POST["city_name"];
  $id=$_GET['uid'];
  $con->updatation('city_master',$data,'city_id',$id);
  header("location:cityInfo.php");
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
          <h2> city </h2>
          <div class="text-right">
            <a href="cityInfo.php"><h2><i class="fa fa-hand-o-right"></i></i> <span>show record</span><h2></a>
          </div>
          <form method="post">
            <div class="form-group">
              <label for="state_id">State</label>
              
              <select class="form-control" name="state_name">
                <?php if(isset($_GET['uid']))
                { ?>
                <option>Select State</option>
                <?php
                $id=$_GET['uid'];
                $res=$con->data_dd('state_master');
                $row_sel=$con->select_up('city_master','city_id',$id);
                // echo $row_sel[1];
                while($row = mysqli_fetch_array($res))
                { ?>
                <option  value="<?php echo $row[0]; ?>" <?php if($row_sel[1] == $row[0])  {
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
                <option>Select State</option>
                <?php
                $result_select=$con->data_dd("state_master");
                while($row=mysqli_fetch_array($result_select))
                {
                echo "<option value='$row[0]'> $row[1] </option>";
                }
                } ?>
              </select>
              
            </div>
            <div class="form-group">
              <label for="state_id">City Name</label>
              <input type="text" class="form-control" id="city_name" placeholder="Enter City Name...." name="city_name" value="<?php if(isset($_GET['uid'])){ echo $row_sel[2]; } ?>">
              <?php if(isset($erct)) {echo $erct; }?>
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