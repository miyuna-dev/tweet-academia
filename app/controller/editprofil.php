<?php
include_once('../../app/func/user_model.php');
$funObj = new dbFunction();
$conec = new Database();
$id = $_SESSION['id'];

if(isset($_POST['editprofil'])){
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $datebirth=$_POST['date'];
    $currentpass=$_POST['currentpass'];
    $gender=$_POST['gender'];
    $city=$_POST['city'];
    $password=$currentpass;
    if($funObj->Veryfypassword($currentpass,$email))
    {
        if($email===$_SESSION['email']){
                
                    
                        $updateprofil = $funObj->Editperfil($name,$lastname,$datebirth,$email,$password,$gender,$city,$id);
                        if($updateprofil){
                            echo "<script>alert('Changes Successful')</script>";
                        }else{
                            echo "<script>alert('Changes Not Successful ?????')</script>";
                        }
                    
                
        }else
            {
           
                if($password == $confirmPassword){
                    $emails = $funObj->isUserExist($email);
                    if(!$email){
                        $updateprofilnewmail = $funObj->Editperfil($name,$lastname,$datebirth,$email,$password,$gender,$citys,$id);
                        if($updateprofilnewmail)
                        {
                            echo "<script>alert('Changes Successful')</script>";
                        }else
                            {
                                echo "<script>alert('Changes Not Successful')</script>";
                            }
                    }else 
                        {
                            echo "<script>alert('Email Already Exist')</script>";
                        }
                } else 
                {
                echo "<script>alert('Password Not Match')</script>";
            
                }
                
            } 

          
    }
    else{
        echo "<script>alert('Current password not the same')</script>";
    }
}








