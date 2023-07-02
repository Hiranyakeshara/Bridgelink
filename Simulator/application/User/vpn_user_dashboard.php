<?php
include("./config.php");
session_start();

$vpnID = $_SESSION['SESSION_VPN'];
$query = "SELECT vpn_name FROM vpn WHERE vpn_id='$vpnID'";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query error: " . mysqli_error($con));
}

$row = mysqli_fetch_assoc($result);
$vpnName = $row['vpn_name'];
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
<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>You Are Logged in as VPN User </h1>
  <p>VPN Name: <h5><?php echo $vpnName; ?></h5></p> 
  <button type="button" class="btn btn-danger">Log Out</button>
</div>

<div class="container mt-5">
  <div class="row">
    <div class="col-sm-4">
      <h3>VPN Applications</h3>
      <?php 
      include("./config.php");
       $query_two = "SELECT * FROM app where vpn_id='$vpnID'";
       $result = mysqli_query($con,$query_two);
      
       while($row = mysqli_fetch_array($result)) {
      ?>
      <p><?php echo $row["app_name"];?></p>
      <p><?php echo $row["app_link"];?></p>

      <?php } ?>
    </div>
    <div class="col-sm-4">
      <h3>Public Applications</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
    <div class="col-sm-4">
      <h3>Ping IP addresses</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
    </div>
  </div>
</div>

</body>
</html>
