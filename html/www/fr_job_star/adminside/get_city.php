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
			    if(isset($_REQUEST["state_id"]))
			    {
			   		$s_id=$_REQUEST['state_id'];
			      $res=$con->select_mul("city_master","state_id","$s_id");
			      //print_r($res);
			    
			      $row_count=mysqli_num_rows($res);
			      if($row_count >= 0)
			      {
			        echo"<option>Select City</option>";
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