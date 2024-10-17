<?php
include "../../includes/car_reservation/select.php";
include "../../includes/conn.php";
include "../../includes/car_reservation/isset.php";
include "../../includes/car_reservation/check.php";
ob_start();

$html = file_get_contents("Car_reservation.html");

ob_start();
include "../../includes/car_reservation/while.php";
$options = ob_get_clean(); 

$html = str_replace("{{options}}", $options, $html);

if (isset($error)) {
    $html = str_replace("{{error}}", "<div style='color:red'>".$error."</div>", $html);
} elseif (isset($green)) {
    $html = str_replace("{{error}}", "<div style='color:green'>$green</div>", $html);
} else {
    $html = str_replace("{{error}}", "", $html);
}

echo $html;
?>
