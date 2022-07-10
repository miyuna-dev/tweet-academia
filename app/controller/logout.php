<?php 
	include_once('register_login_controller.php');
	
		// remove all session variables
		session_unset(); 

		// destroy the session 
		session_destroy();
	
	
		header("Location:../../public/singup/index.php");
	
?>