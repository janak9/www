<html>
<head>
<style>
.d1{
	background-color:grey;  
	padding: 7px 15px 7px 15px; 
	width:97%;
	height=100%;
	color:yellow;  
	font-weight:bold;  
}
.msg{
	background-color:green;  
	padding: 7px 10px 7px 10px; 
	color:white;  
	align:right;
	width:25%;
	font-weight:bold;    
	border-radius:25px;
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
	border:1px solid #BDB76B;
}
</style>
<script type="text/javascript" src="../jquery.js"></script>
<script type="text/javascript">
$(window).load(function(){
  $("html, body").animate({ scrollTop: $(document).height()},0);
});
</script>
</head>
<body bgcolor="grey">
<div style="width:100%;padding-bottom:50px;">
<?php 
	$cnn=mysqli_connect("localhost","root","","chat") or die("not connected");
	session_start();
	if(isset($_POST['sub1']))
	{
		$msg=$_POST['m1'];
		$sen=$_SESSION['logname'];
		$rec=$_SESSION['uname'];
		date_default_timezone_set('Asia/Kolkata');
		$t=date("Y-m-d H:i:s");
		$sql="insert into message values(NULL,'$sen','$rec','$msg','$t')";
		mysqli_query($cnn,$sql);
		echo "<script type='text/javascript'>parent.chat_list.location.reload();</script>";
	}
	$sql="select * from message where reciever_id='".$_SESSION['logname']."' and sender_id='".$_SESSION['uname']."' or reciever_id='".$_SESSION['uname']."' and sender_id='".$_SESSION['logname']."'";
	$res=mysqli_query($cnn,$sql);
	while($row=mysqli_fetch_array($res))
	{
		if($row['sender_id']==$_SESSION['logname'])
		{
?>
	<div align="right" class="d1">
		<div align="left" class="msg">
			<?php echo $row['sender_id'];?>
			<hr border="2" color="red"></hr>
			<?php echo $row['msg'];?>
			<div align="right" style="font-size:11px">
			<?php echo substr($row['msg_time'],11,5);?>
			</div>
		</div>
	</div>
	<?php	
		}
		else{
	?>
	<div align="left" class="d1">
		<div class="msg">
			<?php echo $row['sender_id'];?>
			<hr border="2" color="red"></hr>
			<?php echo $row['msg'];?>
			<div align="right" style="font-size:11px">
			<?php echo substr($row['msg_time'],11,5);?>
			</div>
		</div>
	</div>
	<?php
		}
	}
	?>
</div>
<div style="position:fixed;bottom:1px;width:100%">
<div style="position:sticky">
	<form action="" method="post">
	<input type="text" style="width:95%;" name="m1" class="same" placeholder="<?php echo $_SESSION['uname'];?>'s msg here">
	<input type="submit" value="->" class="same" name="sub1" style="background:darkgreen">
	</form>
	<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>
</div>
</div>
</center>
</body>
</html>