<?php
include_once('../../app/classes/user_model.php');

$funObj = new dbFunction();
$conec = new Database();

if($_POST){
	$conection = $conec->connect();
	$username = $_POST['username'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$datebirth = $_POST['date'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['comfirmpassword'];
	// $gender=$_POST['gender'];
	// $city=$_POST['city'];
	// $tipo = $_FILES['foto']['type'];
	// $sizeimage = $_FILES['foto']['size'];
	// $updateiamge = fopen($_FILES['foto']['tmp_name'], 'r');
	// $image = fread($updateiamge, $sizeimage);
	// $image = mysqli_escape_string($conection, $image);
	
	if ($password == $confirmPassword){
		$emails = $funObj->isUserExist($email);
		if(!$emails){
			$register = $funObj->UserRegister('@'.$username,$firstname,$lastname,$datebirth,$email,$password);
			
			if($register){
				echo "<script>alert('Registration Successful')</script>";
			}else{
				echo "<script>alert('Registration Not Successful')</script>";
			}
		} else {
			echo "<script>alert('Email Already Exist')</script>";
		}
	} else {
		echo "<script>alert('Password Not Match')</script>";
	}
} 
