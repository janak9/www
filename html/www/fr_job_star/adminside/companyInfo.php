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
     $con->deletion("company_master","cmp_id","$did");
  }
  if(isset($_GET["uid"]))
  {
    echo $u=$_GET["uid"];
    header("location:company_master.php?uid=$u");
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
                <div class="box-body" >
                  <div class="box-header">
                    <h2><b>Company Detail</b></h2>
                  </div>
                   <div style="overflow-x:scroll; white-space: nowrap;">
                    <?php
                       $f="";
                       $f[0]="Company Id";
                       $f[1]="Serial Key";
                       $f[2]="Company Name";
                       $f[3]="Company Size";
                       $f[4]="GST Number";
                       $f[5]="Company Phone Number";
                       $f[6]="Company Website";
                       $f[7]="Role Name";
                       $f[8]="Sub Role Name";
                       $f[9]="Address";
                       $f[10]="Pincode";
                       $f[11]="State Name";
                       $f[12]="City Name";
                       $f[13]="Owner Name";
                       $f[14]="Owner Email";
                       $f[15]="Company Logo";
                       $f[16]="Company Image";
                       $f[17]="Email Id";
                        $f[18]="Password";
                      $result_select=$con->grid("company_master",$f);
                                  echo"<tbody>";
                      while($row=mysqli_fetch_array($result_select))
                      {
                        echo "<tr>";
                        echo "<td>$row[0] </td>";
                        echo "<td>$row[1] </td>";
                        echo "<td>$row[2] </td>";
                        echo "<td>$row[3] </td>";
                        echo "<td>$row[4] </td>";
                        echo "<td>$row[5] </td>";
                        echo "<td>$row[6] </td>";
                        $r=$con->select_up("role_master","r_id","$row[7]");
                        echo "<td>$r[1] </td>";
                        $sr=$con->select_up("subrole_master","subr_id","$row[8]");
                        echo "<td>$sr[2] </td>";
                        echo "<td>$row[9] </td>";
                        echo "<td>$row[10] </td>";
                        $st=$con->select_up("state_master","state_id","$row[11]");
                        echo "<td>$st[1] </td>";
                        $ct=$con->select_up("city_master","city_id","$row[12]");
                        echo "<td>$ct[2] </td>";
                        echo "<td>$row[13] </td>";
                        echo "<td>$row[14] </td>";
                      //  echo "<td><img src='assets/image/cmp_logo/" . $row[15] . "' height='100px' width='100px'> </td>";
                        echo "<td><img src='../assets/image/cmp_logo/" . $row[15] . "' height='100px' width='100px'> </td>";
                        echo "<td><img src='../assets/image/cmp_image/" . $row[16] . "' height='100px' width='100px'> </td>";
                        echo "<td>$row[17] </td>";
                        echo"<td> <a href='companyInfo.php?uid=$row[0]'> <i class='glyphicon glyphicon-pencil'></i> </a> </td>";
                        echo"<td> <a href='companyInfo.php?id=$row[0]' onClick=\"return confirm('Are you sure to delete??');\"> <i class='glyphicon glyphicon-trash'></i> </a> </td>   
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