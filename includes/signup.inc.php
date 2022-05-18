<?php

if(isset($_POST['submit'])){
	
	$email = $_POST['email'];
	$username = $_POST['uname'];
	$psw = $_POST['psw'];
	$psw_re = $_POST['psw-repeat'];
	
	require 'dbh.inc.php';
	require 'functions.inc.php';
			

	if(emptyInputSignup($email, $username, $psw ,$psw_re)!== false){
		
		header("location: ../Login.php?error=emptyinput");
		exit();

	}		
		
	if(invalidUid($username)!== false){
		
		header("location: ../Login.php?error=invalidUid");
		exit();

	}	
	
	if(invalidEmail($email)!== false){
		
		header("location: ../Login.php?error=invalidEmail");
		exit();

	}
	
	if(pswMatch($psw, $psw_re)!== false){
		
		header("location: ../Login.php?error=passwordsdontmatch");
		exit();

	}
	
	if(uidExists($conn, $username, $email)!== false){
		
		header("location: ../Login.php?error=usernametaken");
		exit();

	}
	

	
	createUser($conn, $username, $email, $psw);
	
}	
	header("location: ../Login.php?error=sign-up_succes");
	exit();


		
	
