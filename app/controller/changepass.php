<?php
include_once('../../app/func/user_model.php');
$funObj = new dbFunction();
$conec= new Database();
$id=$_SESSION['id'];


if(isset($_POST['changepass'])){

    $email = $_POST['email'];
    $currentpass=$_POST['currentpass'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['comf_password'];
    
    
    if($funObj->Veryfypassword($currentpass,$email))
    {
        
                if($password == $confirmPassword){
                        $changepass= $funObj->EditPass($password,$id);
                        if($changepass){
                            echo "<script>alert('Changes Successful')</script>";
                        }else{
                            echo "<script>alert('Changes Not Successful hola')</script>";
                        }
                    
                }else{
                    echo "<script>alert('Password Not Match ')</script>";
                }
    }
    else{
        echo "<script>alert('Current password not the same')</script>";
    }
}








