

<?php
// Make sure to include the necessary database connection and start the session
include("./connection/config.php");
session_start();

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM admin_users WHERE username='{$username}' AND password='{$password}'";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        die("Query error: " . mysqli_error($con)); // Check for query error and display it
    }

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['SESSION_USERNAME'] = $username;
        header("Location: index.php");
        exit(); // Make sure to add an exit() after the header redirect
    } else {
        $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
    }
} else {
    $msg = "<div class='alert alert-danger'>Email or password do not match.</div>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <!-- ... -->
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bridge Link</h1>
                </div>
                <form class="user" method="post" action="">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control form-control-user"
                            id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                            name="password" placeholder="Password">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Login">
                </form>
            </div>
        </div>
        <!-- ... -->
    </div>
    <!-- ... -->
</body>

</html>
