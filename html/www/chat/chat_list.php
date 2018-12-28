<html>
<?php
$cnn=mysqli_connect("localhost","root","","chat") or die("not connected");
session_start();
?>
<head>
<style>
.d1{
	background-color:transparent;  
	padding: 7px 15px 7px 15px; 
	width:97%;
	height=100%;  
	font-weight:bold;
	border-radius:30px;  
}
.same{
	box-shadow:1px 2px 3px green;	
	background:transparent;
	margin-left:3px;
	position:relative;
	padding:8px;
	font-size:4mm;
	color:yellow;
	border-radius:10px;
	height:37px;
	width:100%;
	border:1px solid #BDB76B;
}
</style>
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#txtname').on('keypress',function(){
		var name=$(this).val();
		$.ajax
		({
			type:'post',
			url:'search.php',
			data:'name='+name,
			success:function(htnl)
			{
				$('#find').html(htnl);
			}
		});
	});	
});
</script>
<script>
function f1(elem)
{
	var un=elem.name;
	window.location.href = "chat_list.php?un=" + un;
}
</script>
</head>
<body bgcolor="silver">
<form action="" method="post">
	<input type="text" name="txtname" id="txtname" placeholder="search" class="same"><br>
</form>
<div id="find">
</div>
<?php
	$sql="select * from message where msg_time in (select max(msg_time) from message group by reciever_id) order by msg_time desc"; 
	//$sql="select * from message msg,members m where m.uname !='".$_SESSION['logname']."' and msg.msg_time in (select max(msg_time) from message group by reciever_id) order by msg.msg_time desc";
	//$sql="select * from members where uname !='".$_SESSION['logname']."'";
	$res=mysqli_query($cnn,$sql);
	while($row=mysqli_fetch_array($res))
	{
		$sql2="select * from members where uname ='".$row['reciever_id']."' and uname !='".$_SESSION['logname']."'";
		$res2=mysqli_query($cnn,$sql2);
		if(mysqli_affected_rows($cnn)==0)
		{
			$sql2="select * from members where uname ='".$row['sender_id']."'";
			$res2=mysqli_query($cnn,$sql2);
		}
		$row2=mysqli_fetch_array($res2);
?>
<a name="<?php echo $row2['uname'];?>" href="chat.php" onclick="f1(this)" target="chat_col" style="text-decoration:none">
<div class="d1">
<p>
<img style="border-radius:50%;float:left;" src="profiles/<?php echo $row2['propic'];?>" width="65" height="65">
<?php
	echo $row2['uname']."<br>";
	$sql="select * from message where reciever_id='".$_SESSION['logname']."' and sender_id='".$row2['uname']."' or reciever_id='".$row2['uname']."' and sender_id='".$_SESSION['logname']."' order by mid desc limit 1";
	$msg=mysqli_query($cnn,$sql);
	$row_msg=mysqli_fetch_array($msg);
	echo $row_msg['msg'];	
?>
</p>
</div>
</a>
<?php 
	}
	if(isset($_GET['un']))
	{
		$_SESSION['uname']=$_GET['un'];
	}
?>
</body>
</html>