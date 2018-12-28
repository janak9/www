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
    $con->deletion("experience_master","exp_id","$did");
    }
    if(isset($_GET["uid"]))
    {
    echo $u=$_GET["uid"];
    header("location:experience_master.php?uid=$u");
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
                    <h2><b>Candidate Experience</b></h2>
                  </div>
                  <div style="overflow-x:scroll; white-space: nowrap;">
                    <?php
                    $f="";
                    $f[0]="Experience Id";
                    $f[1]="Candidate Name";
                    $f[2]="Job Name";
                    $f[3]="Company Name";
                    $f[4]="State Name";
                    $f[5]="City Name";
                    $f[6]="Experience Year";
                    $result_select=$con->grid("experience_master",$f);
                    echo"<tbody>";
                      while($row=mysqli_fetch_array($result_select))
                      {
                      echo "<tr>";
                        echo "<td>$row[0] </td>";
                        $cnd=$con->select_up("candidate_master","cnd_id","$row[1]");
                        echo "<td>$cnd[2] $cnd[3]</td>";
                        echo "<td>$row[2] </td>";
                        echo "<td>$row[3] </td>";
                        $st=$con->select_up("state_master","state_id","$row[4]");
                        echo "<td>$st[1] </td>";
                        $ct=$con->select_up("city_master","city_id","$row[5]");
                        echo "<td>$ct[2] </td>";
                        echo "<td>$row[6] </td>";
                        echo"<td> <a href='experienceInfo.php?uid=$row[0]'> <i class='glyphicon glyphicon-pencil'></i> </a> </td>";
                        echo"<td> <a href='experienceInfo.php?id=$row[0]' onClick=\"return confirm('Are you sure to delete??');\"> <i class='glyphicon glyphicon-trash'></i> </a> </td>
                      </tr>";
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