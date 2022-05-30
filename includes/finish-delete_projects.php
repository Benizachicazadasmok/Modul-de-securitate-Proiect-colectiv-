<?php
require_once 'sesion_starter.php'; 
require_once 'dbh.inc.php';

if(isset($_POST['finished'])){
	
	$P_name = isset($_POST['project']) ? $_POST['project'] : array();

    foreach($P_name as $value) {
        echo $value ."<br>";

        $sql_finish_project="UPDATE projects SET Project_status = 'Finished' WHERE Project_Id='".$value."'; ";
		$execute_sql_finish_project = $conn->query($sql_finish_project);

    }
}


if(isset($_POST['delete'])){
	
	$P_name = isset($_POST['project']) ? $_POST['project'] : array();

    foreach($P_name as $value) {
        echo $value ."<br>";

        $sql_delete_project="DELETE FROM projects WHERE Project_Id = '".$value."';";
		$execute_sql_delete_project = $conn->query($sql_delete_project);

    }
}

header("location: ../Main.php");
exit();