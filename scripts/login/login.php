<?php 
session_start();

require "../../includes/conn.php";
require "../../includes/login/select.php";
include "login.html";


mysqli_close($conn);
?>
