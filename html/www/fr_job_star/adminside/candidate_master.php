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
             else
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
if(isset($_POST['sinsert']))
{
 $erfname="";
              $ercphone="";
              $erlname="";
              $eradd="";
              $erpin="";
              $erpwd="";
              $eremail="";
              
              if(!preg_match("/^[A-Za-z]+$/", $_POST["f_name"]))
              {
                $erfname="<p class='erText'>Name Must Be Form Of Text Not Allow Number Or Other Characters</p>";
              }
              if(!preg_match("/^[A-Za-z]+$/", $_POST["l_name"]))
              {
                $erlname="<p class='erText'>Name Must Be Form Of Text Not Allow Number Or Other Characters</p>";
              }
              if(!preg_match("/^[A-Za-z0-9_ .,:\"\']+$/", $_POST["address"]))
              {
                $eradd="<p class='erText'>Enter Your Address</p>";
              }
              if(!preg_match("/^\d{6}$/", $_POST["pincode"]))
              {
                $erpin="<p class='erText'>Pin Code Must Be 6 Digits</p>";
              }
              if(!preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST["password"]))
              {
                $erpwd="<p class='erText'>Password Must Be At Least 8 Characters And Must Be Contain At Least 1-LowerCase 1-UpperCase And 1-Digit</p>";
              }
              if(!preg_match("/^[A-Za-z]\w+(\.\w+)*\@\w{5,10}+(\.[0-9a-zA-Z]+)*\.[A-Za-z]{2,4}$/", $_POST["email"]))
              {
                $eremail="<p class='erText'>Email Id Is Wrong</p>";
              }
} 
?>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<?php include 'header.php'; ?>
		<?php include 'left_sidebar.php'; ?>
		<!-- Content Wrapper.z Contains page content -->  		
  	<div class="content-wrapper" style="height: 1100px;">
  		<div class="col-md-12">
  			<h2> Candidate </h2>
  		      <div class="text-right">
        	      <a href="table_candidate.php"><h2><i class="fa fa-hand-o-right"></i></i> <span>show record</span></h2></a>
        		</div> 
            <?php
          if(isset($_GET['uid'])){ 
            $id = $_GET['uid'];
            $row=$con->select_up('candidate_master','cnd_id',$id);
          }
          ?>
			<form method="post" action="<?php $PHP_SELF ?>"  enctype="multipart/form-data">
    				<div class="form-group">
      					<label for="f_name">First Name </label>
      					<input type="text" class="form-control" id="f_name" placeholder="Enter First Name...." name="f_name" value="<?php if(isset($_POST['f_name'])){ echo $_POST['f_name']; } ?>">
      					<?php if(isset($erfname)) {echo $erfname; }?>
    				</div>
    				<div class="form-group">
      					<label for="l_name">Last Name </label>
      					<input type="text" class="form-control" id="l_name" placeholder="Enter Last Name...." name="l_name" value="<?php if(isset($_POST['f_name'])){ echo $_POST['l_name']; } ?>">
      					<?php if(isset($erlname)) {echo $erlname; }?>
    				</div>
    				<div class="form-group">
      					<label for="gender">Gender </label>
                  		<div class="radio">
                    		<label>
                    			<input type="radio" name="optionsRadios" id="optionsRadios1" value="male" checked="">
                    	    	male
                    		</label>
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="female">
                            female
                        </label>
                  		</div>
                	</div>
    				<div class="form-group">
      					<label for="address">Address </label>
      					<textarea class="form-control" placeholder="Enter Address.." rows="2" name="address" value="<?php if(isset($_POST['address'])){ echo $_POST['address']; } ?>"></textarea>
      					<?php if(isset($eradd)) {echo $eradd; }?>

    				</div>
    				<div class="form-group">
      					<label for="pincode">Pincode </label>
      					<input type="text" class="form-control" id="pincode" placeholder="Enter Company Name...." name="pincode" value="<?php if(isset($_POST['address'])){ echo $_POST['pincode']; } ?>">
      					<?php if(isset($erpin)) {echo $erpin;}?>

    				</div>
            <div class="form-group">
                <label for="state_id">State Name</label>
                      <select class="form-control" name="state" id="state">
                        <option>Select State</option>
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
                <label for="city_id">City Name</label>
                <select class="form-control" name="city" id="city">
                        <option>Select City</option>
                      </select>  
            </div>
            
            <div class="form-group">
              <label>Date Of Birth</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="dob">
                </div>
            </div>
            <div class="form-group">
                <label for="jobtype_id">Job Type Name</label>
                <select class="form-control" name="jobtype">
                    <option>Select Job Type</option>
                    <?php
                  $result_select=$con->data_dd("jobtype_master");
                  while($row=mysqli_fetch_array($result_select))
                  {
                    echo "<option value='$row[0]'> $row[1] </option>";
                  }
                   ?>
                  </select>
              </div>
              <div class="form-group">
                <label for="cmp_img">Candidate Image</label>
                    <input type="file" id="img" name="img" /> 
                    <div class="errfont"> 
                      <?php 
                      if($err_img != "") { 
                          echo "<p class='erText'>$err_img</p>"; 
                        } 
                      ?>
                     </div>      
            </div>
    				<div class="form-group">
      					<label for="email_id">Email Id</label>
      					<input type="text" class="form-control" id="email_id" placeholder="Enter Company Name...." name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
                <?php if(isset($eremail)) {echo $eremail;}?>
    				</div>
    				<div class="form-group">
      					<label for="password">Password </label>
      					<input type="password" class="form-control" id="password" placeholder="enter company name...." name="password" value="<?php if(isset($_POST['password'])){ echo $_POST['password']; } ?>">
      					<?php if(isset($erpwd)) {echo $erpwd;}?>
    				</div>
    				<div>
    			   		<input type="submit" class="btn btn-default" name="sinsert">
    				</div>
    		</form>
        <?php
            if(isset($_POST['sinsert']))
            {
              $date="";
              $data["randstring"]=$con->randString(11);
              $data["f_name"]=$_POST["f_name"];
              $data["l_name"]=$_POST["l_name"];
              $data["optionsRadios"]=$_POST["optionsRadios"];
              $data["address"]=$_POST["address"];
              $data["pincode"]=$_POST["pincode"];
              $data["State"]=$_POST["state"];
              $data["city"]=$_POST["city"];
              $data1=$_POST["dob"];
              $date=date_create("$data1");
              $data["dob"]=date_format($date,"Y-m-d");
              $data["jobtype"]=$_POST["jobtype"];
              $file_tmp=$_FILES["img"]["tmp_name"];
                $data_fl=$_FILES['img'];
                $data["img"]=$con->img_upload($data_fl,"assets/image/cnd_image/");
             
              $data["email_id"]=$_POST["email"];
              $data["password"]=$_POST["password"];
              //print_r($data);
              $con->insertion('candidate_master',$data); 
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