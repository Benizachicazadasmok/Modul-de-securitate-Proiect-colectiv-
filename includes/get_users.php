<?php
  
require_once 'includes/dbh.inc.php';

$sql_users_permissions="SELECT users.User_Id, projects.Project_name, role.Role_name, users.Username, users.Email FROM `users` JOIN `projects_users_allocation` JOIN `projects` JOIN `role`";

$result_users_permissions = mysqli_query($conn,$sql_users_permissions);
$users_permissions = mysqli_fetch_all($result_users_permissions,MYSQLI_ASSOC);

mysqli_free_result($result_users_permissions);

$sql_users="SELECT * FROM `users`";

$result_users = mysqli_query($conn,$sql_users);
$users = mysqli_fetch_all($result_users,MYSQLI_ASSOC);

mysqli_free_result($result_users);


