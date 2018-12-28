<html>
<body bgcolor="#ccf000">
<center>
<b>
<?php 
$cnn=mysqli_connect("localhost","root","","chat") or die("not connected");
session_start();
echo "welcome ".$_SESSION['logname'];
?><br><br><br>
<a href="logout.php"><button type="button">LogOut</button></a>
</center>
</body>
</html>