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

        $('#state').on('change',function()
        {
            var stateid=$(this).val();
             if(stateid)
             {
               $.ajax
               ({
                 type:'post',
                 url:'get_city.php',
                 data:'state_id='+stateid,
                 success:function(html)
                 {
                   $('#city').html(html);
                 }
               });
              }
             
             {
               $('#city').html('<option value="">not selecte sub city</option>');
             }    
        })
      });
  </script>
<style type="text/css">
  .erText{
    font-family: Arial;
    font-size: 15px;
    color:#cc0000;
    text-decoration: none;
    font-weight: normal;
  }
</style>
</head>
<?php
if(isset($_POST["sinsert"]))
{
$erjname="";
$ercname="";
$erexp="";
              if(!preg_match("/^[A-Za-z0-9_ .,:\"\'&]+$/", $_POST["job_name"]))
              {
                $erjname="<p class='erText'>Enter Name Of Job</p>";
              }
              if(!preg_match("/^[A-Za-z0-9_ .,:\"\'&]+$/", $_POST["cmp_name"]))
              {
                $ercname="<p class='erText'>Enter Name Of Company</p>";
              }
              if(!preg_match("/^[0-9 ]+[A-Za-z]{1,4}$/", $_POST["exp_year"]))
              {
                $erexp="<p class='erText'>Enter Experience Year </p>";
              }
} 
?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<?php include 'header.php'; ?>
		<?php include 'left_sidebar.php'; ?>
		<!-- Content Wrapper.z Contains page content -->
  	<div class="content-wrapper">
  		<div class="col-md-12">
  		  <h2> Experience </h2>
        <div class="text-right">
          <a href="table_experience.php"><h2><i class="fa fa-hand-o-right"></i></i> <span>show record</span></h2></a>
        </div>
        <?php
          if(isset($_GET['uid'])){ 
            $id = $_GET['uid'];
            $row=$con->select_up('experience_master','exp_id',$id);
          }
          ?>
         <form method="post">    
				<div class="form-group">
            <label for="cnd_id"> Candidate </label>
             <select class="form-control" name="candidatename" id="candidatename">
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
            <label for="job_name">Job Name </label>
            <input type="text" class="form-control" id="job_name" placeholder="enter job name...." name="job_name" value="<?php if(isset($_POST['job_name'])){ echo $_POST['job_name']; } ?>">
                <?php if(isset($erjname)) {echo $erjname; }?>  
          </div>
          <div class="form-group">
            <label for="cmp_name">Company Name </label>
            <input type="text" class="form-control" id="cmp_name" placeholder="enter Company Name...." name="cmp_name" value="<?php if(isset($_POST['cmp_name'])){ echo $_POST['cmp_name']; } ?>">
                <?php if(isset($ercname)) {echo $ercname; }?>  
          </div>
          <div class="form-group">
            <label for="state_id">State</label>
             <select class="form-control" name="state_name">
                <option>select state</option>
                <?php
                  $result_select=$con->data_dd("state_master");
                  while($row=mysqli_fetch_array($result_select))
                  {
                    echo "<option value='$row[0]'> $row[1] </option>";
                  }
                ?>
                </select>    
          </div>
          <div class="form-group">
            <label for="city_id">City</label>
              <select class="form-control" name="city_name">
                <option>select city</option>
                <?php
                  $result_select=$con->data_dd("city_master");
                  while($row=mysqli_fetch_array($result_select))
                  {
                    echo "<option value='$row[0]'> $row[2] </option>";
                  }
                ?>
              </select>    
          </div>
          <div class="form-group">
            <label for="exp_year">Experiance year</label>
            <input type="text" class="form-control" id="exp_year" placeholder="enter Experiance year...." name="exp_year" value="<?php if(isset($_POST['exp_year'])){ echo $_POST['exp_year']; } ?>">
                <?php if(isset($erexp)) {echo $erexp; }?>  
          </div>
          <div>
              <input type="submit" class="btn btn-default" name="sinsert" id="sinsert">
          </div>
        </form>  
        <?php
            if(isset($_POST["sinsert"]))
            {
              $data="";
              $data["candidatename"]=$_POST["candidatename"];   
              $data["job_name"]=$_POST["job_name"]; 
              $data["cmp_name"]=$_POST["cmp_name"]; 
              $data["state_name"]=$_POST["state_name"];
              $data["city_name"]=$_POST["city_name"];  
              $data["exp_year"]=$_POST["exp_year"];
              //print_r($data);
              $con->insertion('experience_master',$data); 
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