<?php 

$username=$_POST['username'];
$password=$_POST['password'];

if (($username == "hackmit") && ($password == "alphatr7")) {
 // session_register("username");
  //session_register("password");
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $username;
  session_write_close();
  header("location: upload.php");
  die;
} 
 else {
	 echo "Wrong username/password.";
 } 
?>