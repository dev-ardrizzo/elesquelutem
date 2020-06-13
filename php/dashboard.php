<?php
// Handle or file that connects to the bank 
require $_SERVER['DOCUMENT_ROOT']."/elesquelutem/classes/banco.php";

$dashboardSide = $_SESSION["dashboardSide"];
$clientSide = 0;
$companySide = 1;

if ($dashboardSide == $clientSide) {
    require $_SERVER['DOCUMENT_ROOT']."/elesquelutem/php/clientside.php";
} elseif ($dashboardSide == $companySide) {
    require $_SERVER['DOCUMENT_ROOT']."/elesquelutem/php/companyside.php";
}


?>
