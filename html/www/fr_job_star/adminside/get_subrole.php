<!DOCTYPE html>
<html>
<head>
	<?php 
	include_once("connection.php");
    $con = new JobClass;
    
  ?>
	

</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div>
  			<?php 
			    if(isset($_REQUEST["role_id"]))
			    {
			   		$role_id=$_REQUEST['role_id'];
			      $res=$con->select_mul("subrole_master","r_id","$role_id");
			      //print_r($res);
			    
			      $row_count=mysqli_num_rows($res);
			      if($row_count >= 0)
			      {
			        echo"<option>select Sub Role</option>";
			        while($row=mysqli_fetch_array($res))
			        {
			          echo "<option value='$row[0]'> $row[2]</option>";
			        }
			      } 
			    }
  			?>
  		</div>
		

</body>
</html>