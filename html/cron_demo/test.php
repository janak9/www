<?php 
$cnn=mysqli_connect("localhost","root","123","set1") or die("not connected");
$sql="insert into department values(222,'cron_test','SS')";
if(mysqli_query($cnn,$sql))
    echo '<script>alert("insert record successfully");</script>';
else
    echo '<script>alert("failed to insert record");</script>';
?>
