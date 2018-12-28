<?php
if (session_status() == PHP_SESSION_NONE)
{
session_start();
}


	include_once("connection.php");
	$con = new JobClass;

   	$key=$_SESSION['key'];
	$row=$con->select_up('candidate_master','serial_key',$key);
	$imgname=$row[12];
	if(isset($_GET['abc']))
	{
	$href="update_resume.php?Edit=$row[1]";
	}
	else
	{
		$href="create_resume.php?Edit=$row[1]";
	}
	$data_img = $_FILES['img'];
	$data['cnd_img'] = $con->img_upload($data_img,"../assets/image/cnd_image/");
	$con->updatation('candidate_master',$data,'cnd_id',$row[0]);
	//echo $href;
	header("location:$href");
?>