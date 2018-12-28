
<?php
		if (session_status() == PHP_SESSION_NONE) 
		{
   		 	session_start(); 
		}

    	if ($_SESSION['user_name'] == '' && !isset($_SESSION['user_name'])) { 
    		header("location:index.php");
  		}  
?>