<?php 
$cnn=mysqli_connect("localhost","root","","chat") or die("not connected");
session_start();
$name=$_POST['name'];
$sql="select * from members where uname !='".$_SESSION['logname']."' and uname like '%$name%'";
$res=mysqli_query($cnn,$sql);
if(mysqli_affected_rows($cnn)<=0)
	echo '<br><b><font color="#FF0000">recode not found</font></b><br>';
while($row=mysqli_fetch_array($res))
{
?>
<a name="<?php echo $row['uname'];?>" href="chat.php" onclick="f1(this)" target="chat_col" style="text-decoration:none">
<div class="d1">
	<img style="border-radius:50%;" src="profiles/<?php echo $row['propic'];?>" width="65" height="65"/>
<?php 
	echo $row['uname']."<br>";
	$sql="select * from message where reciever_id='".$_SESSION['logname']."' and sender_id='".$row['uname']."' or reciever_id='".$row['uname']."' and sender_id='".$_SESSION['logname']."' order by mid desc limit 1";
	$msg=mysqli_query($cnn,$sql);
	$row_msg=mysqli_fetch_array($msg);
	echo $row_msg['msg'];
?>
</div>
</a>
<?php 
}
?><br>
<hr border="2" color="gold"></hr>