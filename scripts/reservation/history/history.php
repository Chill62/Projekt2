<?php
include "../../../includes/car_reservation/history/select.php"; 
include "../../../includes/conn.php"; 

mysqli_stmt_bind_param($stmt , "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

ob_start(); 
$html = file_get_contents("history.html");

ob_start();
include "../../../includes/car_reservation/history/while.php"; 
$options = ob_get_clean(); 

$html = str_replace("{{php}}", $options, $html);

echo $html;
?>
