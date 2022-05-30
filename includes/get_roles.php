<?php
require_once 'includes/dbh.inc.php';

$sql_roles="SELECT * FROM `role`";

$result_roles = mysqli_query($conn,$sql_roles);
$roles = mysqli_fetch_all($result_roles,MYSQLI_ASSOC);

mysqli_free_result($result_roles);


