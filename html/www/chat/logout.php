<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php 
session_start();
if(isset($_SESSION['logname']))
{
	session_destroy();
}
echo "<script type='text/javascript'>parent.location.reload();</script>";
?>

</body>
</html>
