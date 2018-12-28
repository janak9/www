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
     $con->deletion("jobtype_master","jtype_id","$did");
     header("location:jobtypeInfo.php");
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
                  <div class="box-body">
                  <div class="box-header">
                    <div><h2><b>Job Type</b></h2></div>
                    <div  class="col-md-6 text-right"><a href="jobtype_master.php"><button type="button" class="btn btn-warning custom-button-width .navbar-right btn-primary"">Add Job Type</button></a></div>
                  </div>
                   <div style="overflow-x:scroll; white-space: nowrap;">
                    <?php
                      $f="";
                      $f[0]="Job Type Id";
                      $f[1]="Job Type Name";
                      $f[2]="Description";
                    $result_select=$con->grid("jobtype_master",$f);
                      echo"<tbody>";
                      $i=1;
                      while($row=mysqli_fetch_array($result_select))
                      {
                        echo "<tr>";
                        echo "<td>$i </td>";
                        echo "<td>$row[1] </td>";
                        echo "<td>$row[2] </td>";
                        echo"<td> <a href='jobtype_master.php?uid=$row[0]'> <i class='glyphicon glyphicon-pencil'></i> </a> </td>";
                        echo"<td> <a href='jobtypeInfo.php?id=$row[0]' onClick=\"return confirm('Are you sure to delete??');\"> <i class='glyphicon glyphicon-trash'></i> </a> </td>   
                        </tr>";
                        $i++;
                      }
               ?> 
               </tbody>
                </table>
                </div>
                </div>
                </div>
                </div>
                </div>
                </section>
                

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