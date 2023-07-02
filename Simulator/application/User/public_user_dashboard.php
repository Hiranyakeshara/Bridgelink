<?php
include("./config.php");
session_start();

$username = $_SESSION['SESSION_USERNAME'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>VPN User Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container-fluid p-5 bg-danger text-white text-center">
  <h1>You Are Logged in as Public User </h1>
  <p>Username Name: <h5><?php echo $username; ?></h5></p> 
  <h2><a class="btn btn-danger" href="logout.php">Logout</a></h2>
</div>

<div class="container mt-5">
  <div class="row">

    <div class="col-sm-4">
      <h3>Applications Available</h3>
      <?php 
      include("./config.php");
       $query_three = "SELECT * FROM public_app ";
       $result = mysqli_query($con,$query_three);
       while($row = mysqli_fetch_array($result)) {
      ?>
    <a href="<?php echo $row["link"];?>" class="btn btn-warning"><?php echo $row["app_name"];?></a>
      <?php } ?>
    </div>
 
</div>

</body>
</html>
