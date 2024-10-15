<?php 

if (isset($_POST['submit'])) {  
    require "variables.php";
    $error = "";

    if (empty($login) || strlen($login) < 5) {
        $error = "Login must be at least 5 characters long.";
    }    
    if (empty($password) || strlen($password) < 8) {
        $error = "Password must be at least 8 characters long.";
    } elseif (!preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        $error = "Password must contain both letters and numbers.";
    }
    if(empty($role))
    {
        $error = "You must select a role for your account";
    }
    if(empty($error))
    {
    $stmt = mysqli_prepare($conn, "SELECT login FROM login WHERE login = ?");
    mysqli_stmt_bind_param($stmt, "s", $login);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        $error = "login already taken"; 
    }
    }else
    if (empty($error)) {
        $stmt = $conn->prepare("INSERT INTO login (login, password, role) VALUES (?, ?, ?)");
        if ($stmt) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt->bind_param("sss", $login, $hashedPassword, $role);
            if ($stmt->execute()) {
                $green = "User registered successfully.";
            } else {
                $error = "Failed to register user: " . $stmt->error; 
            }
            $stmt->close();
        }
    } 
}

?>
