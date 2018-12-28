<?php
if (session_status() == PHP_SESSION_NONE) 
		{
   		 	session_start(); 
		}
//echo   $_SESSION['key'];
if (isset($_SESSION['c_key'])) 
{
	session_destroy();
}
else
{
	session_destroy();
}
header("location:index.php");
?>