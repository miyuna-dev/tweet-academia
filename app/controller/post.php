<?php

include_once('../../app/classes/user_model.php');
date_default_timezone_set('Europe/Amsterdam');  
$funObj = new dbFunction();
$conec= new Database();
$id=$_SESSION['id'];
$dateCreation= date('y/m/d H:i');

if(isset($_POST['tweetpost'])){
    
    
    if($_FILES['mediafile']['size']!=0){
        $text = $_POST['tweet'];
        $conection=$conec->connect();
        
        $tipo = $_FILES['mediafile']['type'];
        $sizeimage = $_FILES['mediafile']['size'];
        $updateiamge = fopen($_FILES['mediafile']['tmp_name'], 'r');
        $image = fread($updateiamge, $sizeimage);
        $image = mysqli_escape_string($conection, $image);
        $posttweet= $funObj->PostTweet($text,$id,$dateCreation,$image,$tipo);
        if($posttweet){
            echo "tweet posted";
        }else{
            echo "<script>alert('error tweet not posted')</script>";
        }
    }else{
        $text = $_POST['tweet'];

    $image= "";
    $tipo="";
    

    
     $posttweet= $funObj->PostTweet($text,$id,$dateCreation,$image,$tipo);
    //  ,$image,$tipo
                    if($posttweet){
                            echo "tweet posted";
                        }else{
                            echo "<script>alert('error tweet not posted')</script>";
                        }
                    }
                }
                          

                    
               
     

          
  