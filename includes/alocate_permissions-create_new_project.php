<?php
require_once 'sesion_starter.php';
require_once 'dbh.inc.php';

if(isset($_POST['create'])){
	
	$P_name = $_POST['project_name'];
	$Date_start = $_POST['date_start'];
	$Date_end = $_POST['date_end'];
	$P_req = $_POST['project_requirements'];
    $P_desc = $_POST['project_description'];

    $create_project = "INSERT INTO projects (Project_name, Date_start, Date_end, Project_requirements, Project_description) VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt,$create_project)){
            
            header("location: ../Main.php?error=project_error");
            exit();
            
        }
        
    mysqli_stmt_bind_param($stmt, "sssss", $P_name, $Date_start, $Date_end, $P_req, $P_desc);	
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
        
    header("location: ../Main.php");
    exit();
}
	

if(isset($_POST['alocate'])){
	
	$Project_Id = $_POST['Project'];
	$User_Id = $_POST['Username'];
	$Role_Id = $_POST['Role'];
	$User_objections = $_POST['User_objections'];


    $alocate_permissions = "INSERT INTO projects_users_allocation (Project_Id, User_Id, Role_Id, User_objections) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt,$alocate_permissions)){
            
            header("location: ../Main.php?error=project_error");
            exit();
            
        }
        
    mysqli_stmt_bind_param($stmt, "ssss", $Project_Id, $User_Id, $Role_Id, $User_objections);	
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
        
    header("location: ../Main.php");
    exit();
}
	
    



		
	
