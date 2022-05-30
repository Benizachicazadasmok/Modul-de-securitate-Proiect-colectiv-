<?php
  
require_once 'includes/dbh.inc.php';

$sql='SELECT * FROM projects';

$result = mysqli_query($conn,$sql);

$projects = mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);


