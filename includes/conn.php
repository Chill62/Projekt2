<?php 

$conn = mysqli_connect('localhost','root','','car_rental');
function($sql, $conn , $param_type , $params)
{
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, $param_type, $params);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
}
  
?> 