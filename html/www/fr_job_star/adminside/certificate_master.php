<!DOCTYPE html>
<html>
<head>
	<?php include 'add_ons_head.php'; 
 include_once("connection.php");
    $con = new JobClass;
    $err_img="";
  ?>
</head>
<?php
if(isset($_POST['sinsert']))
{

} 
?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<?php include 'header.php'; ?>
		<?php include 'left_sidebar.php'; ?>
		<!-- Content Wrapper.z Contains page content -->
  		<div class="content-wrapper">
  			<div class="col-md-12">
  				<h2> Certificate </h2>
          <div class="text-right">
            <a href="table_certificate.php"><h2><i class="fa fa-hand-o-right"></i></i> <span>show record</span></h2></a>
          </div>
          <?php
          if(isset($_GET['uid'])){ 
            $id = $_GET['uid'];
            $row=$con->select_up('certificate_master','cer_id',$id);
          }
          ?>
				  <form method="post" enctype="multipart/form-data">            
            <div class="form-group">
                <label for="cnd_id">Cndidate Name</label>
              <select class="form-control" name="cname" id="cname">
                        <option>Select Candidate</option>
                        <?php
                              $result_select=$con->data_dd("candidate_master");
                              while($row=mysqli_fetch_array($result_select))
                              {
                                ?>
                                    <option value="<?php echo $row[0]; ?>"><?php echo $row[3]; ?> </option>";
                              <?php
                              }
                        ?>
                      </select>
            </div>
            <div class="form-group">
                <label for="upload_cer">Upload Certificate </label>
                <input type="file" id="fcer" name="fcer" /> 
                    <div class="errfont"> 
                      <?php 
                      if($err_img != "") { 
                          echo $err_img; 
                        } 
                      ?>
                     </div>
            </div>
            <div>
                <button type="submit" class="btn btn-default" name="sinsert"> Submit  </button>
            </div>
          </form>
           <?php
              if(isset($_POST['sinsert']))
            {
              
              $data="";
              $data["cndname"]=$_POST["cname"];
              if(isset($_FILES['fcer']) && !empty($_FILES['fcer']['name'])) 
              {
                $file_tmp=$_FILES["fcer"]["tmp_name"];
                $data_fl=$_FILES['fcer'];
                $data["img"]=$con->img_upload($data_fl,"assets/image/cnd_certificate/");
                $con->insertion('certificate_master',$data);
              }
              else 
              {
                echo "File Not Selected";
              } 
            }
            ?>  
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