<?php 
$user_id = $_COOKIE['user_id']; 
$sql = "SELECT reservations.id, car_list.name, reservations.start_date, reservations.end_date, reservations.status 
        FROM reservations
        JOIN car_list ON reservations.car_id = car_list.id
        WHERE reservations.user_id = ?";
        
?>