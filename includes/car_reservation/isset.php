<?php 
$cars = mysqli_query($conn , $sql);

if(isset($_POST['submit']))
{ 
    $sql = "SELECT * FROM car_list WHERE is_available = 1";
    $cars = mysqli_query($conn , $sql);
    header('Location: Car_reservation.php?refresh=true');
}
?>