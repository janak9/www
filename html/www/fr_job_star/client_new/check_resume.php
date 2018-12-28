<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
$k=$_SESSION["key"];
}
if(!isset($_SESSION["key"]))
{
header("location:index.php");
}
include_once("connection.php");

$con = new JobClass;
$row=$con->select_up("candidate_master","serial_key","$k");
$add=$row['address'];
$job_post=$con->select_up("jobpost_master","cmp_id",$row[0]);

$id=$_GET['cmpid'];
 $jid=$_GET['jid'];
$cnd_id=$row['cnd_id'];
@$chk=$_GET['chk'];
@$chk1=$_GET['chk1'];

if($add=="")
 { 
 	if(isset($chk))
 	{
 		$href1="company_detail.php?cmp_id=$id&jid=$jid";
 	}
 	elseif(isset($chk1)) 
 	{
 		$href1="company_detail.php?cmp_id=$id&jid=$jid";
 	}
 	else
 	{
 		$href1="job_details.php?cid=$id&jid=$jid";
 	}
 	?>
 	<script>
		alert('Firest Create Your Resume'); 

	 	window.location.href="<?php echo $href1; ?>";
	 </script>
<?php 	
 	//header("location:job_details.php?cid=$id&jid=$jid");
 } 
 else
 {
 	if(isset($chk))
 	{
 		?>
 		<script>alert('Already Applied For This Job');
 		window.location.href="company_detail.php?cmp_id=<?php echo $id; ?>&jid=<?php echo $jid; ?>";
 	</script>
 	<?php
 	}
 	else
 	{
 		if(isset($chk))
 		{
 			$href="company_detail.php?cmp_id=$id&a=abc&jid=$jid";
 		}
 		elseif(isset($chk1)) 
	 	{
 			$href="company_detail.php?cmp_id=$id&a=abc&jid=$jid";
	 	}
 		else
 		{
 			$href="job_details.php?cid=$id&a=abc&jid=$jid";
 		}

 		$data['cmp_id']=$id;
 		$data['j_id']=$jid;
 		$data['cna_id']=$row[0];
 		$data['date']=date("y/m/d");
 		$data['is_active']="0";
 		$data['is_approve']="0";
 		$data['is_read']="0";
 		$con->insertion('apply_master',$data);
    
 		header("location:$href");
 }
 }
 ?>