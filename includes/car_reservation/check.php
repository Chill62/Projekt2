<?php
if (isset($_POST['submit'])) {
    include "../../includes/car_reservation/variables.php";

    if (empty($car_id) || empty($start_date) || empty($end_date)) {
        $error = "Please fill in all fields.";
        exit;
    }

    $sql = "SELECT * FROM reservations WHERE car_id = ? AND (start_date BETWEEN ? AND ? OR end_date BETWEEN ? AND ?)";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, 'issss', $car_id, $start_date, $end_date, $start_date, $end_date);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $error = "The selected car is not available for the given date range.";
    } else {
        $sql = "INSERT INTO reservations (car_id, user_id, start_date, end_date, status) VALUES (?, ?, ?, ?, 'confirmed')";
        $stmt = mysqli_prepare($conn, $sql);  

        $user_id = $_COOKIE['user_id'];
        mysqli_stmt_bind_param($stmt, 'iiss', $car_id, $user_id, $start_date, $end_date);
        mysqli_stmt_execute($stmt);

        $sql = "UPDATE car_list SET is_available = 0 WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, 'i', $car_id);
        mysqli_stmt_execute($stmt);

        $green = "Reservation successful!";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
