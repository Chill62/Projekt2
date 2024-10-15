<?php 
require "../../includes/conn.php";
require "../../includes/login/insert.php";
ob_start();
include 'signup.html';
$htmlContent = ob_get_clean();

if (!empty($error)) {
    $htmlContent = str_replace('<div class="error-message"></div>', '<div class="error-message">' . $error . '</div>', $htmlContent);
} else if (isset($green)) {
    $htmlContent = str_replace('<div class="error-message"></div>', '<div class="green-message">' . $green . '</div>', $htmlContent);
}

echo $htmlContent;

mysqli_close($conn);
?>
