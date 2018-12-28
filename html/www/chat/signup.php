<html>
<body>
<?php
$cnn=mysqli_connect("localhost","root","","chat") or die(mysqli_error());
?>
<center>
<h1> Registration</h1>
<form action="" method="post" enctype="multipart/form-data">
	user name : <input type="text" name="uname" required><br>
	password : <input type="password" name="pwd" required><br>
	profile pic : <input type="file" name="img" id="img"><br>
	<input type="submit" name="btnsub" value="submit">
</form>
</center>
<?php
if(isset($_REQUEST['btnsub']) && isset($_FILES['img']))
{
	$uname=$_REQUEST['uname'];
	$pwd=$_REQUEST['pwd'];
	$fname=$_FILES['img']['name'];
	$tname=$_FILES['img']['tmp_name'];
	$ext=array("jpg","png","jpeg","gif");
	echo $e=strtolower(end(explode(".",$fname)));
	if(in_array($e,$ext))
	{
		$sql="insert into members values(NULL,'$uname','$pwd',NULL)";
		mysqli_query($cnn,$sql) or die(mysqli_error());
		$sql="select * from members order by uid desc limit 1";
		$res=mysqli_query($cnn,$sql) or die(mysqli_error());
		$row=mysqli_fetch_array($res);
		
		$fname=$row['uid'].".".$e;
		move_uploaded_file($tname,"profiles/$fname");
		$sql="update members set propic='$fname' where uid=".$row['uid'];
		mysqli_query($cnn,$sql) or die(mysqli_error());
		header("location:index.php");
	}
	else
		echo '<br><b><font color="#FF0000">please enter valid file</font></b><br>';

}
?>
</body>
</html>
