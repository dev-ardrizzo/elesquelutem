<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="css/core.css">
</head>
<body>


<?php

// Handle or file that contain the core
require $_SERVER['DOCUMENT_ROOT']."/elesquelutem/php/core.php";


$dashboardSide = $_SESSION["dashboardSide"];
$clientSide = 0;
$companySide = 1;

if ($dashboardSide == $clientSide) {
    require $_SERVER['DOCUMENT_ROOT']."/elesquelutem/php/clientside.php";
} elseif ($dashboardSide == $companySide) {
    require $_SERVER['DOCUMENT_ROOT']."/elesquelutem/php/companyside.php";
}



?>



    
</body>
</html>