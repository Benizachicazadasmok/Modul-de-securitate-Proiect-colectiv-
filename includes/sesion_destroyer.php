<?php
require_once 'sesion_starter.php';
require_once 'dbh.inc.php';


		$now = date("Y-m-d H:i:s");
		//pentru tabela de users
		$sql_date_logout="UPDATE users SET Logged_out='".$now."' WHERE User_Id='".$_SESSION["User_Id"]."'; ";
		$execute_sql_date_logout = $conn->query($sql_date_logout);


		//pentru tablea de connection_logs
		$sql_date_logout="UPDATE connection_logs SET Logged_out = '".$now."' WHERE User_Id = '".$_SESSION["User_Id"]."' ORDER BY Login_index DESC LIMIT 1 ; ";
		$execute_sql_date_logout = $conn->query($sql_date_logout);

	session_unset();

	session_destroy();

	header("location: ../Login-Sign-up.php");
	exit();

?>