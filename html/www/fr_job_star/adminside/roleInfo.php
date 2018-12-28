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
     $con->deletion("role_master","r_id","$did");
  }
  if(isset($_GET["uid"]))
  {
    echo $u=$_GET["uid"];
    header("location:role_master.php?uid=$u");
  }
  ?>
  <?php
 
  if(isset($_GET['id'])){
      $did=$_GET['id'];
   $con->deletion("role_master","r_id",$did);
    //header("location:table_education.php");
  }
  if(isset($_GET['uid']))
  {
    $id=$_GET['uid'];
    $row_sel=$con->select_up('role_master','r_id',$id);
    if(isset($_POST['btnupdate']))
    {
      $data="";
      $data['s_id']=$_POST['service_name'];
      $data['ss_name']=$_POST['txtssname'];   

      if(isset($_FILES['simg']) && !empty($_FILES['simg']['name'])) 
      {
        $data_fl=$_FILES['simg'];
        // $con->img_upload($data_fl);
        $data['ss_img'] = $con->img_upload($data_fl,"assets/images/sub_services/");
      } 
      else
      {
        $data['ss_img']=$cur_img;
      } 
      $data['ss_desc']=$_POST['txtdesc'];
      $con->updatation('sub_services',$data,'ss_id',$id);
      header("location:sub_services.php");

    }
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
                    <div><h2><b>Skill</b></h2></div>
                      <div class="col-md-6 text-right"><a href="role_master.php"><button type="button" class="btn btn-warning custom-button-width .navbar-right btn-primary"">Add Role</button></a></div>
                    </div>
                   <div style="overflow-x:scroll; white-space: nowrap;">

                      <?php
                      $f="";
                      $f[0]="Skill Id";
                      $f[1]="Skill Name";

                    $result_select=$con->grid("role_master",$f);
                      echo"<tbody>";
                      $i=1;
                      while($row=mysqli_fetch_array($result_select))
                      {
                        echo "<tr>";
                        echo "<td>$i </td>";
                        echo "<td>$row[1] </td>";
                        echo"<td> <a href='role_master.php?uid=$row[0]'> <i class='glyphicon glyphicon-pencil'></i> </a> </td>";
                        echo"<td> <a href='roleInfo.php?id=$row[0]' onClick=\"return confirm('Are you sure to delete??');\"> <i class='glyphicon glyphicon-trash'></i> </a> </td>   
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