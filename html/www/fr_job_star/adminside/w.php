<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include 'add_ons_head.php'; ?>
	  <?php
    include_once("connection.php");
    $con = new JobClass;
    $err_img="";
  ?>


  <!-- Bootstrap 3.3.7 -->
  
  <!-- Font Awesome -->
  
  <!-- Ionicons -->
  
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">



</head>
<body class="hold-transition skin-blue sidebar-mini">
  <?php  include 'add_ons_body.php'; ?>  
    
	<div class="wrapper">

		<?php include 'header.php'; ?>
		<?php include 'left_sidebar.php'; ?>
		<!-- Content Wrapper.z Contains page content -->
  		<div class="content-wrapper">
  			<div class="col-md-12">
  				<h2> State </h2>
				    <form method="post">
       				<div class="form-group">
      					<label for="state_name">State Name </label>
      					<input type="text" class="form-control" id="state_name" placeholder="enter state name...." name="state_name">
    				  </div>
    				  <div>
    			   		<input type="submit" class="btn btn-default" name="sinsert"><br><br>
    				  </div>
              </form>
            	  <?php
                  if(isset($_POST['sinsert']))
                     {
                        $date=" ";
                        $data["state"]=$_POST['state_name'];
                        $con->insertion('state_master',$data);
                    ?>
                    <script> alert("insert succesffully");</script>
                    <section class="content">
                      <div class="row">
                         <div class="col-xs-12">
                            <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">Data Table With Full Features</h3>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                              <?php 
                              }
                                $result_select=$con->grid("state_master");
                                while($row=mysqli_fetch_array($result_select))
                                {
                                    echo "<tr>";
                                    echo "<td>$row[0] </td>";
                                    echo "<td>$row[1] </td>
                                    <td> <a href='sub_services.php?uid=$row[0]'> <i class='glyphicon glyphicon-pencil'></i> </a> </td>
              <td> <a href='sub_services.php?id=$row[0]' onClick=\"return confirm('Are you sure to delete??');\"> 
                <i class='glyphicon glyphicon-trash'></i> </a> </td>   </tr>";
                                    echo  "</tr>";
                                }
                                ?>
                                </table>  
                              </div>
                              <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                          </div>
                          <!-- /.col -->
                      </div>
                       <!-- /.row -->
                       
                     </section>
                       <!-- /.content -->
  
  
</div>	
</div>
  		<!-- /.content-wrapper -->
		
	</div>
  
  <?php include 'footer.php'; ?>
    <?php include 'right_sidebar.php'; ?>
	<!-- ./wrapper -->	
</body>
</html>