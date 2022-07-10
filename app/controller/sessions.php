<?php 
	include_once('../../app/classes/user_model.php');
	
	
	// include_once('changepass.php');
	// if($_SESSION["id"]){
	// 	header("Location:home.php");
	// }
	if(isset($_POST['welcome'])){
		// remove all session variables
		session_unset(); 

		// destroy the session 
		session_destroy();
	}
	if(!($_SESSION)){
		header("Location:index.php");
	}
	
?>