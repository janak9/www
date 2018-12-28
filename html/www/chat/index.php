<html>
<body>
<?php 
$cnn=mysqli_connect("localhost","root","","chat") or die("not connected");
session_start();
if(isset($_SESSION['logname']))
{
	header("location:home.php");
}
?>
<center>
<h1>Log In</h1>
<form action="" method="post">
user Name :-<input type="text" name="txtuname" /><br>
password :-<input type="password" name="txtpwd" /><br>
<input type="submit" name="btnlogin" value="LogIn" /><br>
</form>
<a href="signup.php">sign up</a>
<?php 
if(isset($_REQUEST['btnlogin']))
{
	$un=$_REQUEST['txtuname'];
	$pwd=$_REQUEST['txtpwd'];
	$sql="select * from members where uname='$un' and pwd='$pwd'";
	$res=mysqli_query($cnn,$sql);
	$rc=mysqli_affected_rows($cnn);
	if($rc > 0)
	{
		$_SESSION['logname']=$un;
		header("location:home.php");
	}
	else
		echo '<br><b><font color="#FF0000">please enter valid user name and pwd</font></b><br>';
}
?>
</center>
</body>
</html>
