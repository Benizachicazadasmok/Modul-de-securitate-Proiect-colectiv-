<?php
  
require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';

$user = $_SESSION["User_Id"];

$sql = " SELECT * FROM users_permissions WHERE User_Id = '" . $_SESSION['User_Id'] . "' " ;

$result = mysqli_query($conn,$sql);

$user_permissions= mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);


