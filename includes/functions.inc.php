<?php
function emptyInputSignup($email, $username, $password, $password_re)
{

	if (empty($email) || empty($username) || empty($password) || empty($password_re)) {

		$result = true;
	} else {

		$result = false;
	}

	return $result;
}

function invalidUid($username)
{

	if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {

		$result = true;
	} else {

		$result = false;
	}

	return $result;
}

function invalidEmail($email)
{

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

		$result = true;
	} else {

		$result = false;
	}

	return $result;
}

function passwordMatch($password, $password_re)
{

	if ($password != $password_re) {

		$result = true;
	} else {

		$result = false;
	}

	return $result;
}

function uidExists($conn, $username, $email)
{

	$sql = "SELECT * FROM users WHERE Username = ? OR Email = ?;";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)) {

		header("location: ../Login-Sign-up.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($resultData)) {

		return $row;
	} else {

		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $email, $password)
{

	$create_user = "INSERT INTO users (Username, Email, Password) VALUES (?,?,?);";
	$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $create_user)) {

		header("location: ../Login-Sign-up.php?error=stmtfailed");
		exit();
	}

	//encryption
	$ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;
	$encryption_iv = '1234567891011121';
	$encryption_key = "This is a very secure seed :D";

	$psd_encryption = openssl_encrypt(
		$password,
		$ciphering,
		$encryption_key,
		$options,
		$encryption_iv
	);

	mysqli_stmt_bind_param($stmt, "sss", $username, $email, $psd_encryption);


	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);

	header("location: ../Login-Sign-up.php?error=sign-up_succes");
	exit();
}

function emptyInputLogin($username, $password)
{

	if (empty($username) || empty($password)) {

		$result = true;
	} else {

		$result = false;
	}

	return $result;
}

function loginUser($conn, $username, $password)
{

	$uidExists = uidExists($conn, $username, $username);

	if ($uidExists === false) {

		header("location: ../Login-Sign-up.php?error=wronglogin");
		exit();
	}

	$password_from_db = $uidExists["Password"];

	//decryption
	$ciphering = "AES-128-CTR";
	$iv_length = openssl_cipher_iv_length($ciphering);
	$options = 0;
	$decryption_iv = '1234567891011121';
	$decryption_key = "This is a very secure seed :D";

	$psd_decryptied = openssl_decrypt(
		$password_from_db,
		$ciphering,
		$decryption_key,
		$options,
		$decryption_iv
	);


	$checkPwd = strcmp($password, $psd_decryptied);

	if ($checkPwd !== 0) {

		header("location: ../Login-Sign-up.php?error=wronglogin");
		exit();
	} elseif ($checkPwd === 0) {

		require_once 'sesion_starter.php';
		require_once 'dbh.inc.php';



		// create session variables
		$_SESSION["Username"] = $uidExists["Username"];

		$sql = "SELECT * FROM users WHERE Username = '" . $_SESSION["Username"] . "'";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		// asta ii variabila pe care o tot cautai >:(		
		$_SESSION["User_Id"] = $row["User_Id"];

		$_SESSION["Email"] = $row["Email"];


		session_regenerate_id(true);
		$_SESSION["Session_Id"] = session_id();


		$now = date("Y-m-d H:i:s");

		//pentru tabela users
		$sql_user_login = "UPDATE users SET Logged_in = '" . $now . "', Logged_out = NULL,  Session_Id='" . $_SESSION["Session_Id"] . "' WHERE User_Id='" . $_SESSION["User_Id"] . "'; ";
		$execute_sql_date_login = $conn->query($sql_user_login);


		//pentru tabela connection_logs
		$sql_user_connection_logs = "INSERT INTO connection_logs (User_Id, Logged_in, Session_Id) VALUES (?, ?, ?);";


		$stmt = mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt, $sql_user_connection_logs)) {

			header("location: ../Login-Sign-up.php?error=db_error");
			exit();
		}

		mysqli_stmt_bind_param($stmt, "sss", $_SESSION["User_Id"], $now, $_SESSION["Session_Id"]);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);

		header("location: ../Main.php");
		exit();
	}
}
