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
  ?>
  <script src="jquery-1.11.3.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function()
    {
    $('#cmp_name').on('change',function()
    {
    var cmpid=$(this).val();
    if(cmpid)
    {
    $.ajax
    ({
    type:'post',
    url:'get_apply.php',
    data:'c_id='+cmpid,
    success:function(html)
    {
    $('#jname').html(html);
    }
    });
    }
    else
    {
    $('#jname').html('<option value="">not selecte sub role</option>');
    }
    });
  });
  </script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<?php include 'header.php'; ?>
		<?php include 'left_sidebar.php'; ?>
		<!-- Content Wrapper.z Contains page content -->
  		<div class="content-wrapper">
        <div class="col-md-12">
          <h2> Apply </h2>
          <div class="text-right">
              <a href="table_apply.php"><h2><i class="fa fa-hand-o-right"></i></i> <span>show record</span></h2></a>
          </div>
          <?php
          if(isset($_GET['uid'])){ 
            $id = $_GET['uid'];
            $row=$con->select_up('apply_master','ap_id',$id);
          }
          ?>
          <form method="post">         
            <div class="form-group">
              <label for="cmp_id">Company Name </label>
              <select class="form-control" name="cmp_name" id="cmp_name">
                <option>Select Comapany</option>
                  <?php
                    $result_select=$con->data_dd("company_master");
                      while($row=mysqli_fetch_array($result_select))
                      {
                  ?>
                        <option value="<?php echo $row[0]; ?>"><?php echo $row[2]; ?> </option>";
                  <?php
                      }
                  ?>
                </select>  
            </div>
            <div class="form-group">
              <label for="j_id">Job Name</label>
              <select class="form-control" name="jname" id="jname">
                <option>Select Job Name</option>
                  <?php
                    $result_select=$con->data_dd("jobpost_master");
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
              <label for="cnd_id">Candidate Name </label>
              <select class="form-control" name="candidatename" id="candidatename">
                <option>Celect Candidate</option>
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
                <label for="is_active">Is Active</label>
                <input type="text" class="form-control" id="is_active" placeholder="Enter Is Active...." name="is_active">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-default" name="sinsert" value="Submit">
            </div>
          </form>  
           <?php

            if(isset($_POST['sinsert']))
            {
              $data="";
              $data["companyname"]=$_POST["cmp_name"];
              $data["jname"]=$_POST["jname"];
              $data["candidatename"]=$_POST["candidatename"];
              
              $data["doa"]=date("Y/m/d");
              $data["is_active"]=$_POST["is_active"];
              $con->insertion('apply_master',$data); 
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