<?php
// Make sure to include the necessary database connection and start the session
include("./config.php");
session_start();

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM public_users WHERE user_name='{$username}' AND password='{$password}' ";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Query error: " . mysqli_error($con)); // Check for query error and display it
    }

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['SESSION_USERNAME'] = $username;
        header("Location: public_user_dashboard.php");
        exit(); // Make sure to add an exit() after the header redirect
    } else {
        $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
    }
} else {
    $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
}
?>
