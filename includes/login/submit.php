<?php 
if ($stmt) {
    if (isset($_POST['submit'])) {
        $login = $_POST['login'];
        mysqli_stmt_bind_param($stmt, "s", $login);

        if (mysqli_stmt_num_rows($stmt) > 0) {
            mysqli_stmt_bind_result($stmt, $id);
            mysqli_stmt_fetch($stmt);

            setcookie("user_id", $id, time() + (86400 * 30), "/");
            
            header("Location: oferts.php");
            exit; 
        } else {
            $error = "Account not found";
        }

        mysqli_stmt_close($stmt);
    }
}
?>
