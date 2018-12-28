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
    $err_img="";
  if(isset($_GET["id"]))
  {
     $did=$_GET["id"];
     $con->deletion("subrole_master","subr_id","$did");
     header("location:subroleInfo.php");
  }
  ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include 'header.php'; ?>
    <?php include 'left_sidebar.php'; ?>
    <!-- Content Wrapper.z Contains page content -->
    <div class="content-wrapper">
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <!-- /.box -->
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="box-header">
                    <div><h2><b>Sub Skill</b></h2></div>
                    <div  class="col-md-6 text-right"><a href="subrole_master.php"><button type="button" class="btn btn-warning custom-button-width .navbar-right btn-primary"">Add Sub Role</button></a></div>
                  </div>
                  <div  style="overflow-x:scroll; white-space: nowrap;">
                  <?php
                      $f="";
                      $f[0]="Sub Skill Id";
                      $f[1]="Skill Id";
                      $f[2]="Sub Skill Name";
                      $result_select=$con->grid("subrole_master",$f);
                      echo"<tbody>";
                      while($row=mysqli_fetch_array($result_select))
                      {
                        echo "<tr>";
                        echo "<td>$row[0] </td>";
                        $r=$con->select_up("role_master","r_id","$row[1]");
                        echo "<td>$r[1] </td>";
                        echo "<td>$row[2] </td>";
                        echo"<td> <a href='subrole_master.php?uid=$row[0]'> <i class='glyphicon glyphicon-pencil'></i> </a> </td>";
                        echo"<td> <a href='subroleInfo.php?id=$row[0]' onClick=\"return confirm('Are you sure to delete??');\"> <i class='glyphicon glyphicon-trash'></i> </a> </td>   
                        </tr>";
                      }
                
               echo " </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>
                </section>";
                ?>     
          
        </div>
    <?php include 'footer.php'; ?>
        
    </div>
      <!-- /.content-wrapper -->
    <?php include 'right_sidebar.php'; ?>

  </div>
  <!-- ./wrapper -->
  
  <?php include 'add_ons_body.php'; ?>

</body>
</html>