<?php
include("./config.php");
session_start();

// Get the current logout time
$logoutTime = date('Y-m-d H:i:s');

// Store the logout time in a session variable
$_SESSION['SESSION_LOGOUT_TIME'] = $logoutTime;


$logoutTime = $_SESSION['SESSION_LOGOUT_TIME'];
// Retrieve the username from the session
$username = $_SESSION['SESSION_USERNAME'];

// Update the logout time in the logged_ips table
$query = "UPDATE logged_ips SET logout_time = '$logoutTime' WHERE username = '$username' AND logout_time IS NULL";
mysqli_query($con, $query);

// Unset and destroy the session
session_unset();
session_destroy();

// Redirect to the login page
header("Location: ./userlogin.php");
?>
