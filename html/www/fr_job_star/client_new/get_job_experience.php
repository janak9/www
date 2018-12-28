<!DOCTYPE html>
<?php 
	include_once("connection.php");
    $con = new JobClass;
    session_start();
	if(isset($_REQUEST["cmp_id"]))
	{
		$cmp_id=$_REQUEST['cmp_id'];
		$k=$_SESSION['key'];
        $row=$con->select_up("candidate_master","serial_key","$k");
        echo $qry="select j_id from apply_master where is_approve=1 and cnd_id=".$row[0]." and cmp_id=".$cmp_id;
		$res=mysqli_query($con->con,$qry);
		$j_id=mysqli_fetch_all($res);
		$jid=array_map(function($index)
		{
			return $index[0];
		}, $j_id);
		$j_id=implode(",",$jid);
		echo $qry="select * from jobpost_master where j_id IN($j_id)";
		$res=mysqli_query($con->con,$qry);
		$row_count=mysqli_num_rows($res);
		if($row_count >= 0)
		{
			echo"<option>Select City</option>";
			while($row=mysqli_fetch_array($res))
			{
			  echo "<option value='$row[0]'> $row[3]</option>";
			}
		} 
	}

?>
