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
        $('#rname').on('change',function()
        {
          var roleid=$(this).val();
          if(roleid)
          {
            $.ajax
            ({
              type:'post',
              url:'get_subrole.php',
              data:'role_id='+roleid,
              success:function(html)
              {
                $('#subrole').html(html);
              }
            });
           }
          
          {
            $('#subrole').html('<option value="">not selecte sub role</option>');
          }  

         });
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
               $('#city').html('<option value="">Not Selecte City</option>');
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
if(isset($_POST['sinsert']))
{
$erjname="";
              $ermins="";
              $ermaxs="";
              $erminex="";
              $ermaxex=""; 
              $erdes="";
              $erphone="";
              if(!preg_match("/^[A-Za-z_ .,:\"\'&]+$/", $_POST["j_name"]))
              {
                $erjname="<p class='erText'>Enter Name Of Job</p>";
              }
               if(!preg_match("/^[0-9]+$/", $_POST["min_salary"]))
              {
                $ermins="<p class='erText'>Enter Minimum Salary</p>";
              }
               if(!preg_match("/^[0-9]+$/", $_POST["max_salary"]))
              {
                $ermaxs="<p class='erText'>Enter Maximum Salary</p>";
              }
               if(!preg_match("/^[0-9 ]+[A-Za-z]{1,4}$/", $_POST["min_exp"]))
              {
                $erminex="<p class='erText'>Enter Minimum Experience  </p>";
              }
               if(!preg_match("/^[0-9 ]+[A-Za-z]{1,4}$/", $_POST["max_exp"]))
              {
                $ermaxex="<p class='erText'>Enter Maximum Experience</p>";
              }
               if(!preg_match("/^[A-Za-z0-9_ .,:\"\'&]+$/", $_POST["des"]))
              {
                $erdes="<p class='erText'>Enter Description</p>";
              }
               if(!preg_match("/^\d{10,12}$/", $_POST["phone"]))
              {
                $erphone="<p class='erText'>Enter Phone Number Must Be In Digits</p>";
              }
} 
?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<?php include 'header.php'; ?>
		<?php include 'left_sidebar.php'; ?>
		<!-- Content Wrapper.z Contains page content -->
  	<div class="content-wrapper" style="height: 1200px">
  			<div class="col-md-12">
  				<h2> JobPost </h2>
          <div class="text-right">
              <a href="table_jobpost.php"><h2><i class="fa fa-hand-o-right"></i><span>show record</span></h2></a>
          </div>
          <?php
          if(isset($_GET['uid'])){ 
            $id = $_GET['uid'];
            $row=$con->select_up('jobpost_master','j_id',$id);
          }
          ?>
				  <form method="post">       				
       			<div class="form-group">
      				<label for="cmp_id">Company</label>
      				<select class="form-control" name="cmpname">
                <option>select company name</option>
                <?php
                  $result_select=$con->data_dd("company_master");
                  while($row=mysqli_fetch_array($result_select))
                  {?>
                    <option value="<?php echo $row[0]; ?>"> <?php echo $row[2]; ?> </option>";
                    //ssecho $val=$row[0];
                  <?php
                }
                  ?>
              </select>
    				</div>
    				<div class="form-group">
      					<label for="jobtype_id">Job Type Id</label>
      					<select class="form-control" name="jobtype">
                    <option>Select Job Type</option>
                    <?php
                  $result_select=$con->data_dd("jobtype_master");
                  while($row=mysqli_fetch_array($result_select))
                  {
                    echo "<option value='$row[0]'> $row[1] </option>";
                    $val=$row[0];
                  }
                  ?>
                  </select>
    				</div>
    				<div class="form-group">
      					<label for="j_name">Job Name</label>
      					<input type="text" class="form-control" id="j_name" placeholder="Enter Job Name ..." name="j_name" value="<?php if(isset($_POST['j_name'])){ echo $_POST['j_name']; } ?>">
                <?php if(isset($erjname)) {echo $erjname; }?>
    				</div>
    				<div class="form-group">
                <label for="r_id">Role</label>
                <select class="form-control" name="rname" id="rname">
                  <option>Select Role</option>
                  <?php
                  $result_select=$con->data_dd("role_master");
                  while($row=mysqli_fetch_array($result_select))
                  {
                    echo "<option value='$row[0]'> $row[1] </option>";
                    $val=$row[0];
                  }
                  ?>
                </select>
            </div>
    				<div class="form-group">
                <label for="subr_id">Sub Role</label>
                 <select class="form-control" name="subrole" id="subrole">
                        <option>Select Sub Role</option>
                      </select>           
            </div>
    				<div class="form-group">
      					<label for="min_salary">Minimam Salary</label>
      					<input type="text" class="form-control" id="min_salary" placeholder="Enter Minimam Salary ..." name="min_salary" value="<?php if(isset($_POST['min_salary'])){ echo $_POST['min_salary']; } ?>">
                <?php if(isset($ermins)) {echo $ermins; }?>
    				</div>
    				<div class="form-group">
      					<label for="max_salary">Maximam Salary</label>
      				S	<input type="text" class="form-control" id="max_salary" placeholder="Enter Maximam  Salary ..." name="max_salary" value="<?php if(isset($_POST['max_salary'])){ echo $_POST['max_salary']; } ?>">
                <?php if(isset($ermaxs)) {echo $ermaxs; }?>
    				</div>
    				<div class="form-group">
      					<label for="min_exp">Minimam Exprience</label>
      					<input type="text" class="form-control" id="min_exp" placeholder="Enter Minimam Exprience ..." name="min_exp" value="<?php if(isset($_POST['min_exp'])){ echo $_POST['min_exp']; } ?>">
                <?php if(isset($erminex)) {echo $erminex; }?>
    				</div>
    				<div class="form-group">
      					<label for="max_exp">Maximam Exprience</label>
      					<input type="text" class="form-control" id="max_exp" placeholder="Enter Maximam Exprience ..." name="max_exp" value="<?php if(isset($_POST['max_exp'])){ echo $_POST['max_exp']; } ?>">
                <?php if(isset($ermaxex)) {echo $ermaxex; }?>
    				</div>
    				<div class="form-group">
                <label for="state_id">State</label>
                      <select class="form-control" name="state" id="state">
                        <option>select state</option>
                        <?php
                              $result_select=$con->data_dd("state_master");
                              while($row=mysqli_fetch_array($result_select))
                              {
                                ?>
                                    <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?> </option>";
                              <?php
                              }
                        ?>
                      </select>  
            </div>
            <div class="form-group">
                <label for="city_id">City</label>
                <select class="form-control" name="city" id="city">
                        <option>select city 1</option>
                      </select>  
            </div>
    				<div class="form-group">
      					<label for="des">Description</label>
      					<input type="text" class="form-control" id="des" placeholder="Enter Description ..." name="des" value="<?php if(isset($_POST['des'])){ echo $_POST['des']; } ?>">
                <?php if(isset($erdes)) {echo $erdes; }?>
    				</div>
    				<div class="form-group">
      					<label for="responcive_email">Responcive Email</label>
      					<input type="email" class="form-control" id="responcive_email" placeholder="Enter Responcive Email ..." name="responcive_email">
    				</div>
    				<div class="form-group">
      					<label for="phone">Phone</label>
      					<input type="text" class="form-control" id="phone" placeholder="Enter Phone ..." name="phone" value="<?php if(isset($_POST['phone'])){ echo $_POST['phone']; } ?>">
                <?php if(isset($erphone)) {echo $erphone; }?>
    				</div>
            
    				<div class="form-group">
    			   		<input type="submit" class="btn btn-default" name="sinsert">
    				</div>
    		  </form>
          <?php
            if(isset($_POST['sinsert']))
            {
              $date="";
              
              $data["cname"]=$_POST["cmpname"];
              $data["jobtype"]=$_POST["jobtype"];
              $data["jname"]=$_POST["j_name"];
              $data["rname"]=$_POST["rname"];
              $data["subrole"]=$_POST["subrole"];
              $data["minsal"]=$_POST["min_salary"];
              $data["maxsal"]=$_POST["max_salary"];
              $data["minexp"]=$_POST["min_exp"];
              $data["maxexp"]=$_POST["max_exp"];
              $data["state"]=$_POST["state"];
              $data["city"]=$_POST["city"];
              $data["des"]=$_POST["des"];
              $data["resemail"]=$_POST["responcive_email"];
              $data["phone"]=$_POST["phone"];
              $data["cdate"]=date("y/m/d");
              $data["udate"]=date("y/m/d");
              $con->insertion('jobpost_master',$data); 
           } 
          ?>
          
        </div>	
        <!-- /.col-md-12 -->
		</div>
  		<!-- /.content-wrapper -->
		<?php include 'footer.php'; ?>
		<?php include 'right_sidebar.php'; ?>
	</div>
	<!-- ./wrapper -->
	<?php include 'add_ons_body.php'; ?>
</body>
</html>