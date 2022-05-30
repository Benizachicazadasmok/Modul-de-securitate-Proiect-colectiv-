<?php

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password_re = $_POST['password-repeat'];

	require 'dbh.inc.php';
	require 'functions.inc.php';


	if (emptyInputSignup($email, $username, $password, $password_re) !== false) {

		header("location: ../Login-Sign-up.php?error=emptyinput");
		exit();
	}

	if (invalidUid($username) !== false) {

		header("location: ../Login-Sign-up.php?error=invalidUid");
		exit();
	}

	if (invalidEmail($email) !== false) {

		header("location: ../Login-Sign-up.php?error=invalidEmail");
		exit();
	}

	if (passwordMatch($password, $password_re) !== false) {

		header("location: ../Login-Sign-up.php?error=passwordsdontmatch");
		exit();
	}

	if (uidExists($conn, $username, $email) !== false) {

		header("location: ../Login-Sign-up.php?error=usernametaken");
		exit();
	}



	createUser($conn, $username, $email, $password);
}
header("location: ../Login-Sign-up.php?error=sign-up_succes");
exit();
