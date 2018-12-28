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
if($add=="")
 { ?>
 	<script>
		alert('Firest Create Your Resume'); 
	 	window.location.href="job_details.php?cid=<?php echo $id; ?>&jid=<?php echo $jid; ?>";
	 </script>
<?php 	
 	//header("location:job_details.php?cid=$id&jid=$jid");
 } 
 else
 {
 	$data['cmp_id']=$id;
 	$data['j_id']=$jid;
 	$data['cna_id']=$row[0];
 	$data['date']=date("y/m/d");
 	$data['is_active']="0";
 	$data['is_approve']="0";
 	$con->insertion('apply_master',$data);
    
 	header("location:job_details.php?cid=$id&a=abc&jid=$jid");
 }
 ?>