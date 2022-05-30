<?php
 
if(isset($_POST['submit'])){
	
	$username= $_POST['username'];
	$password= $_POST['password'];
	
	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';
	
	if (emptyInputLogin($username, $password) == true){

		 header("location: ../Login-Sign-up.php?error=emptyinput");
		exit();
	}
	
	loginUser($conn, $username, $password);
	
}
	else{
		
		header("location: ../Login-Sign-up.php");
		exit();
		
	}