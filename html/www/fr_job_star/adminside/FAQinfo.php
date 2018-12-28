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
     $con->deletion("faq","id","$did");
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
                    <div><h2><b>FAQ</b></h2></div>
                  </div>
                   <div style="overflow-x:scroll; white-space: nowrap;">
                    <?php
                      $f="";
                      $f[0]="Id";
                      $f[1]="Candidate Name";
                      $f[2]="Subject";
                      $f[3]="Description";
                      $f[4]="Answare";
                    $result_select=$con->grid("faq",$f);
                      echo"<tbody>";
                      $i=1;
                      while($row=mysqli_fetch_array($result_select))
                      {
                        $cnd=$con->select_up('candidate_master','cnd_id',$row[1]);
                        echo "<tr>";
                        echo "<td>$i </td>";
                        echo "<td>".$cnd['f_name']." ".$cnd['l_name']."</td>";
                        echo "<td>$row[2] </td>";
                        echo "<td>$row[3] </td>";
                        echo "<td>$row[4] </td>";
                        echo"<td> <a href='FAQ_ans.php?uid=$row[0]'> <i class='glyphicon glyphicon-pencil'></i> </a> </td>";
                        echo"<td> <a href='FAQinfo.php?id=$row[0]' onClick=\"return confirm('Are you sure to delete??');\"> <i class='glyphicon glyphicon-trash'></i> </a> </td>   
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