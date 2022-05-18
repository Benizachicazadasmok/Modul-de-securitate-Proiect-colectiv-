<?php
require_once 'sesion_starter.php';
require_once 'dbh.inc.php';

if(isset($_POST['submit'])){

	$username_of_friend = $_POST["user"];

	//get User_Id_friend
	$sql_for_friend = "SELECT * FROM users WHERE Username = '".$username_of_friend."';";
	$result_for_friend = $conn->query($sql_for_friend);
	$row_for_friend = $result_for_friend->fetch_assoc();	
	$User_Id_friend=$row_for_friend["User_Id"];
	
	//insert data in table friend_list
	
	$insert_into_friend_list = "INSERT INTO friend_list (User_Id, User_Id_friend) VALUES (?,?);";
	$stmt = mysqli_stmt_init($conn);
	
	if(!mysqli_stmt_prepare($stmt,$insert_into_friend_list)){
		
		header("location: ../Logged_in.php?error=stmtfailed");
		exit();
		
	}
	
	mysqli_stmt_bind_param($stmt, "ss", $_SESSION["User_Id"], $User_Id_friend);
	
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	
	header("location: ../Logged_in.php?error=none");
	exit();

}