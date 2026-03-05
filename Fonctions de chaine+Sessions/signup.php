<?php
$valide=true;
if(isset($_POST['ok'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirmation=$_POST['confirmation'];

    if(empty($password)|| empty($confirmation)|| empty($email)){
        echo"all fields are required";
        $valide=false;
    }else{
        if(!str_ends_with($email,"@ofppt.ma")){
            echo"the email must end with @ofppt.ma";
            $valide=false;
        }
        if(strlen($password ) < 8){
            echo"the password must have at least 8 caracters";
            $valide=false;
        }
        if(!preg_match("/[A-Z]/",$password)){
            echo"the password must have at least one upper case letter";
            $valide=false;
        }
        if(!preg_match("/[0-9]/",$password)){
            echo"the password must have at least one number";
            $valide=false;
        }
        if($confirmation !== $password){
            echo"the passwords do not match";
            $valide=false;
        }
    }if( $valide===true){
        session_start();
    $_session['email']= $email;
    header("location:welcome.php");
    exit;
    
    }
        
    
    

   
}



?>