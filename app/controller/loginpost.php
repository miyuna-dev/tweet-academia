<?php
include_once('../../app/classes/user_model.php');
$funObj = new dbFunction();
$conec= new Database();
if($_POST){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$user = $funObj->Login('@' . $username, $password);
		if ($user) {
			// login Success
		   header("location:../../public/singup/home.php");
          
		} else {
			// login Failed
			echo "<script>alert('Email / Password Not Match')</script>";
		}
        
	}