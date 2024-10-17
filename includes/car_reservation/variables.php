<?php 
$car_id = $_POST['car_id'];
if (isset($_POST['date'])) {
    $date_range = $_POST['date'];
    if (strpos($date_range, ' to ') !== false) {
        list($start_date, $end_date) = explode(' to ', $date_range);
    }
}

?>