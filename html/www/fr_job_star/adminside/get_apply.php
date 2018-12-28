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
			    if(isset($_REQUEST["c_id"]))
			    {
			   		$cmp_id=$_REQUEST['c_id'];
			      $res=$con->select_mul("jobpost_master","cmp_id","$cmp_id");
			      //print_r($res);
			    
			      $row_count=mysqli_num_rows($res);
			      if($row_count >= 0)
			      {
			        echo"<option>Select Job</option>";
			        while($row=mysqli_fetch_array($res))
			        {
			          echo "<option value='$row[0]'> $row[3]</option>";
			        }
			      } 
			    }
			   
  			?>
  		</div>
		

</body>
</html>