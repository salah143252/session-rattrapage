<?php
session_start();
if(!isset($_session['email'])){
    header("location:signup.php");
    exit;
} 
echo "welcome " .$_session["email"];

?>