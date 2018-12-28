
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
          else
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
             else
             {
               $('#city').html('<option value="">not selecte sub city</option>');
             }    
        });
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
  $ercmpname="";
              $ersize="";
              $ergst="";
              $ercweb="";
              $eradd="";
              $erpin="";
              $erowname="";
              $erpwd="";
              $eremail="";
              if(!preg_match("/^[A-Za-z0-9_ .,:\"\'&]+$/", $_POST["cmp_name"]))
              {
                $ercmpname="<p class='erText'>Enter Name Of Company</p>";
              }
              if(!preg_match("/^\d{1,11}$/", $_POST["cmp_size"]))
              {
                $ersize="<p class='erText'>Company size Must Be In Digits</p>";
              }
               if(!preg_match("/^\d{15}$/", $_POST["gst_no"]))
              {
                $ergst="<p class='erText'>Company GST Number Must Be 15 Digits</p>";
                $match=$con->select_up("company_master","gst_no",$_POST["gst_no"]);
                if(!$match)
                {
                  $ergst="<p class='erText'>Company GST Number Must Be 15 unicque</p>";
                }
              }
               if(!preg_match("/^\d{10,12}$/", $_POST["cmp_phone"]))
              {
                $ercphone="<p class='erText'>Company Phone Number Must Be In Digits</p>";
              }
               if(!preg_match("/^[a-zA-Z]\w+(\.\w+)*\w+(\.[0-9a-zA-Z+])*\.[a-zA-Z]{2,4}$/", $_POST["cmp_web"]))
              {
                $ercweb="<p class='erText'>Company Web Site Name Must Be In Proper Formate</p>";
              }
               if(!preg_match("/^[A-Za-z0-9_ .,:\"\']+$/", $_POST["address"]))
              {
                $eradd="<p class='erText'>Enter Your Address</p>";
              }
               if(!preg_match("/^\d{6}$/", $_POST["pincode"]))
              {
                $erpin="<p class='erText'>Pin Code Must Be 6 Digits</p>";
              }
               if(!preg_match("/^[A-Za-z0-9_ .,:\"\'&]+$/", $_POST["owner_name"]))
              {
                $erowname="<p class='erText'>Enter Name Of Company</p>";
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
  	<div class="content-wrapper" style="height: 1400px">
  	  <div class="col-md-12">
  		  <h2> Company </h2>
        <div class="text-right">
          <a href="table_company.php"><h2><i class="fa fa-hand-o-right"></i></i> <span>show record</span></h2></a>
        </div>  
        <?php
          if(isset($_GET['uid'])){ 
            $id = $_GET['uid'];
            $row=$con->select_up('company_master','cmp_id',$id);
          }
          ?>
          <form method="post" action="" enctype="multipart/form-data">
       			<div class="form-group">
      					<label for="cmp_name">Company Name </label>
      					<input type="text" class="form-control" id="cmp_name" placeholder="Enter Company Name...." name="cmp_name" value="<?php if(isset($_POST['cmp_name'])){ echo $_POST['cmp_name']; } ?>">
                <?php if(isset($ercmpname)) {echo $ercmpname; }?>
    				</div>
    				<div class="form-group">
      					<label for="cmp_size">Company Size </label>
      					<input type="text" class="form-control" id="cmp_size" placeholder="Enter Company Size...." name="cmp_size" value="<?php if(isset($_POST['cmp_Size'])){ echo $_POST['cmp_size']; } ?>">
                <?php if(isset($ersize)) {echo $ersize; }?>
    				</div>
    				<div class="form-group">
      					<label for="gst_no">Gst Number </label>
      					<input type="text" class="form-control" id="gst_no" placeholder="Nnter Gst Number...." name="gst_no" value="<?php if(isset($_POST['gst_no'])){ echo $_POST['gst_no']; } ?>">
                <?php if(isset($ergst)) {echo $ergst; }?>
    				</div>
    				<div class="form-group">
      					<label for="cmp_phone">Company Phone Number</label>
      					<input type="text" class="form-control" id="cmp_phone" placeholder="Enter Company Phone Number...." name="cmp_phone" value="<?php if(isset($_POST['cmp_phone'])){ echo $_POST['cmp_phone']; } ?>">
                <?php if(isset($ercphone)) {echo $ercphone; }?>
    				</div>
               <div class="form-group">
                     <label for="cmp_phone">Company Website </label>
                     <input type="text" class="form-control" id="cmp_web" placeholder="Enter Company Web Site...." name="cmp_web" value="<?php if(isset($_POST['cmp_web'])){ echo $_POST['cmp_web']; } ?>">
                <?php if(isset($ercweb)) {echo $ercweb; }?>
               </div>
    				<div class="form-group">
      					<label for="r_id">Skill </label>
              	<select class="form-control" name="rname" id="rname">
                  <option>Select Skill</option>
                  <?php
                  $result_select=$con->data_dd("role_master");
                  while($row=mysqli_fetch_array($result_select))
                  {
                    echo "<option value='$row[0]'> $row[1] </option>";
                  }
                  ?>
                </select>
      			</div>
    				<div class="form-group">
      					<label for="subr_id">Sub Role </label>
                 <select class="form-control" name="subrole" id="subrole">
              		    	<option>Select Sub Role</option>
                	    </select>    				
            </div>
    				<div class="form-group">
      					<label for="address">Address </label>
      					<textarea class="form-control" rows="3" placeholder="Enter Your Address..." name="address" value="<?php if(isset($_POST['address'])){ echo $_POST['address']; } ?>"></textarea>
                <?php if(isset($eradd)) {echo $eradd; }?>
    				</div>
    				<div class="form-group">
      					<label for="pincode">Pincode </label>
      					<input type="text" class="form-control" id="pincode" placeholder="Enter Company Name...." name="pincode" value="<?php if(isset($_POST['address'])){ echo $_POST['pincode']; } ?>">
                <?php if(isset($erpin)) {echo $erpin;}?>
    				</div>
    				<div class="form-group">
      					<label for="state_id">State </label>
              		    <select class="form-control" name="state" id="state">
              		    	<option>Select State</option>
                	    	<?php
                              $result_select=$con->data_dd("state_master");
                              while($row=mysqli_fetch_array($result_select))
                              {
                                echo "<option value='$row[0]'> $row[1] </option>";
                                $val=$row[0];
                              }
                        ?>
                	    </select>  
    				</div>
    				<div class="form-group">
      					<label for="city_id">City </label>
      					<select class="form-control" name="city" id="city">
              		    	<option>Select City</option>
                	    </select>  
    				</div>
    				<div class="form-group">
      					<label for="owner_name">Owner Name </label>
      					<input type="text" class="form-control" id="owner_name" placeholder="Enter Owner Name...." name="owner_name" value="<?php if(isset($_POST['owner_name'])){ echo $_POST['owner_name']; } ?>">
                <?php if(isset($erowname)) {echo $erowname;}?>
    				</div>
    				<div class="form-group">
                <label for="owner_email">Owner Email </label>
                <input type="email" class="form-control" id="qwner_email" placeholder="Enter Owner Email Id ...." name="owner_email">
            </div>
            <div class="form-group">
                <label for="cmp_img">Company Image</label>
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
                <label for="email">Email </label>
                <input type="text" class="form-control" id="email" placeholder="Enter Email Id...." name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>">
                <?php if(isset($eremail)) {echo $eremail;}?>
            </div>
            <div class="form-group">
                <label for="password">Password </label>
                <input type="password" class="form-control" id="password" placeholder="Enter Your Password...." name="password" value="<?php if(isset($_POST['password'])){ echo $_POST['password']; } ?>">
                <?php if(isset($erpwd)) {echo $erpwd;}?>
            </div>
            <div class="form-group">
                <input  type="submit" class="btn btn-default" name="sinsert"> 
            </div>
    			</form>
          <?php
          $data_fl="";
          $file_tmp="";
            if(isset($_POST['sinsert']))
            {
              $data="";
              $data["randstring"]=$con->randString(11);
              $data["cmpname"]=$_POST["cmp_name"];
              $data["cmpsize"]=$_POST["cmp_size"];
              $data["gstno"]=$_POST["gst_no"];
              $data["phone"]=$_POST["cmp_phone"];
              $data["cmpweb"]=$_POST["cmp_web"];
              $data["rname"]=$_POST["rname"];
              $data["subrole"]=$_POST["subrole"];
              $data["address"]=$_POST["address"];
              $data["pincode"]=$_POST["pincode"];
              $data["state"]=$_POST["state"];
              $data["city"]=$_POST["city"];
              $data["oname"]=$_POST["owner_name"];
              $data["oemail"]=$_POST["owner_email"];
              $file_tmp=$_FILES["img"]["tmp_name"];
                $data_fl=$_FILES['img'];
                $data["img"]=$con->img_upload($data_fl,"assets/image/cmp_logo/");
             
              $data["email"]=$_POST["email"];
              $data["password"]=$_POST['password'];
               //print_r($data);
              $con->insertion('company_master',$data); 
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