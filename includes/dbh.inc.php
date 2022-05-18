<?php

	$servername = "localhost";
	$dBUsername = "root";
	$dBPassword = "";
	$dBName = "modul_de_securitate";

	$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

	if(!$conn){
	
		die("Connection failed: ".msqli_connect_error());
	
	}

