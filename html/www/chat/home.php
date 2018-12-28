<html>
<?php 
$cnn=mysqli_connect("localhost","root","","chat") or die("not connected");
session_start();
if(!isset($_SESSION['logname']))
{
	header("location:index.php");
}
else
{
?>
<frameset rows="20%,80%">
	<frame name="heading" noresize="noresize" src="heading.php"/>
<frameset cols="20%,80%">
	<frame name="chat_list" scrolling="no" src="chat_list.php">
	<frame scrolling="no" name="chat_col" src=""/>
</frameset> 
</frameset>
<?php
}
?>
</html>