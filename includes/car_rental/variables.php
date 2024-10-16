<?php
if (isset($_POST['name'])) {
    $name = $_POST['name'];
}

if (isset($_POST['cost'])) {
    $cost = $_POST['cost'];
} else {
    $cost = 0; 
}

if (isset($_POST['type'])) {
    $type = $_POST['type'];
}

if (isset($_POST['horsepower'])) {
    $hp = $_POST['horsepower'];
}

if (isset($_POST['trunk_capacity'])) {
    $capacity = $_POST['trunk_capacity'];
}

if (isset($_POST['fuel_type'])) {
    $fuel = $_POST['fuel_type'];
}

if (isset($_POST['description'])) {
    $description = $_POST['description'];
}

if (isset($_POST['date'])) {
    $date_range = $_POST['date'];
    if (strpos($date_range, ' to ') !== false) {
        list($date_start, $date_end) = explode(' to ', $date_range);
    }
}

if (isset($_POST['car-type'])) {
    $car_type = $_POST['car-type'];
}

$cost_range = 100;
$min_cost = $cost - $cost_range;
$max_cost = $cost + $cost_range;

?>
