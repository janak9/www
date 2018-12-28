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
     $con->deletion("candidate_master","cnd_id","$did");
  }
  if(isset($_GET["uid"]))
  {
    echo $u=$_GET["uid"];
    header("location:candidate_master.php?uid=$u");
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
                    <h2><b>Candidate Detail</b></h2>
                  </div>
                   <div style="overflow-x:scroll; white-space: nowrap;">
                <?php
                $f="";
                $f[0]="Candidate Id";
                $f[1]="Serial Key";
                $f[2]="First Name";
                $f[3]="Last Name";
                $f[4]="Gender";
                $f[5]="Address";
                $f[6]="Pincode";
                $f[7]="State Name";
                $f[8]="City Name";
                $f[9]="DOB";
                $f[10]="Job Type Name";
                $f[11]="Expected Salary";
                $f[12]="Candidate Photo";
                $f[13]="Email Id";  
                $f[14]="Password";
                    $result_select=$con->grid("candidate_master",$f);
                      echo"<tbody>";
                      $i=1;
                      while($row=mysqli_fetch_array($result_select))
                      {
                        echo "<tr>";
                        echo "<td>$i </td>";
                        echo "<td>$row[1] </td>";
                        echo "<td>$row[2] </td>";
                        echo "<td>$row[3] </td>";
                        echo "<td>$row[4] </td>";
                        echo "<td>$row[5] </td>";
                        echo "<td>$row[6] </td>";
                        $st=$con->select_up("state_master","state_id","$row[7]");
                        echo "<td>$st[1]</td>";
                        $ct=$con->select_up("city_master","city_id","$row[8]");
                        echo "<td>$ct[2] </td>";
                        echo "<td>$row[9] </td>";
                        $jt=$con->select_up("jobtype_master","jtype_id","$row[10]");
                        echo "<td>$jt[1] </td>";
                        echo "<td>$row[11] </td>";
                         echo "<td><img src='../assets/image/cnd_image/" . $row[12] . "' height='50px' width='50px'> </td>";
                         echo "<td>$row[12] </td>";
                        echo"<td> <a href='candidateInfo.php?uid=$row[0]'> <i class='glyphicon glyphicon-pencil'></i> </a> </td>";
                        echo"<td> <a href='candidateInfo.php?id=$row[0]' onClick=\"return confirm('Are you sure to delete??');\"> <i class='glyphicon glyphicon-trash'></i> </a> </td>   
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