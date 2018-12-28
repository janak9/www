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
     $con->deletion("jobpost_master","j_id","$did");
  }
  if(isset($_GET["uid"]))
  {
    echo $u=$_GET["uid"];
    header("location:jobpost_master.php?uid=$u");
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
                    <h2><b>Job Post</b></h2>
                  </div>
                   <div style="overflow-x:scroll; white-space: nowrap;">
            <?php
            $f="";
            $f[0]="Job Id";
            $f[1]="Company Name";
            $f[2]="Job Type Name";
            $f[3]="Job Name";
            $f[4]="Role Name";
            $f[5]="Sub Role Name";
            $f[6]="Minimum Salary";
            $f[7]="Maximum Salary";
            $f[8]="Minimum Experience";
            $f[9]="Maximum Experience";
            $f[10]="State Name";
            $f[11]="City Name";
            $f[12]="Description";
            $f[13]="Responsiv Email";
            $f[14]="Phone Number";
            $f[15]="Create Daate";
            $f[16]="Update Date";
               $result_seledct=$con->grid("jobpost_master",$f);
                      echo"<tbody>";
                      while($row=mysqli_fetch_array($result_seledct))
                      {
                        echo "<tr>";
                        echo "<td>$row[0] </td>";
                        $cmp=$con->select_up("company_master","cmp_id",$row[1]);
                        echo "<td>$cmp[2] </td>";
                        $jt=$con->select_up("jobtype_master","jtype_id",$row[2]);
                        echo "<td>$jt[1] </td>";
                        echo "<td>$row[3] </td>";
                        $r=$con->select_up("role_master","r_id",$row[4]);
                        echo "<td>$r[1] </td>";
                        $sr=$con->select_up("subrole_master","subr_id",$row[5]);
                        echo "<td>$sr[2] </td>";
                        echo "<td>$row[6] </td>";
                        echo "<td>$row[7] </td>";
                        echo "<td>$row[8] </td>";
                        echo "<td>$row[9] </td>";
                        $st=$con->select_up("state_master","state_id","$row[10]");
                        echo "<td>$st[1]</td>";
                        $ct=$con->select_up("city_master","city_id","$row[11]");
                        echo "<td>$ct[2] </td>";
                        echo "<td>$row[12] </td>";
                        echo "<td>$row[13] </td>";
                        echo "<td>$row[14] </td>";
                        echo "<td>$row[15] </td>";
                        echo "<td>$row[16] </td>";
                        echo"<td> <a href='jobpostInfo.php?uid=$row[0]'> <i class='glyphicon glyphicon-pencil'></i> </a> </td>";
                        echo"<td> <a href='jobpostInfo.php?id=$row[0]' onClick=\"return confirm('Are you sure to delete??');\"> <i class='glyphicon glyphicon-trash'></i> </a> </td>   
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