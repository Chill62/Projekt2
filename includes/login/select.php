<?php 
$sql = "SELECT password, login FROM login WHERE login = ?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    $login = $_POST['login']; 
    mysqli_stmt_bind_param($stmt, "s", $login);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        header("Location: oferts.php");
        exit; 
    } else {
        $error = "Account not found";
    }

    mysqli_stmt_close($stmt);
}
?>
