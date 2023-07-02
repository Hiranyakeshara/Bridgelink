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

if(isset($_POST["ping"]))
{
    //post all value
    extract($_POST);
    $username = $_SESSION['SESSION_USERNAME'];
    $query = "INSERT INTO `ping` (`id`, `username`, `get_ip`, `message`) VALUES (NULL, '".$username."','".$get_ip."', '".$message."');";

    mysqli_query($con,$query);
    header("location:vpn_user_dashboard.php");
    
}


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
  <h2><a class="btn btn-danger" href="logout.php">Logout</a></h2>
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
    <a href="<?php echo $row["app_link"];?>" class="btn btn-primary"><?php echo $row["app_name"];?></a>
      <?php } ?>
    </div>
    <div class="col-sm-4">
      <h3>Public Applications</h3>
      <?php 
      include("./config.php");
       $query_three = "SELECT * FROM public_app ";
       $result = mysqli_query($con,$query_three);
       while($row = mysqli_fetch_array($result)) {
      ?>
    <a href="<?php echo $row["link"];?>" class="btn btn-warning"><?php echo $row["app_name"];?></a>
      <?php } ?>
    </div>
    <div class="col-sm-4">
      <h3>Ping IP addresses</h3>
       <form action="" method="post">
        <div class="mb-3 row">
       <select class="form-select" aria-label="Disabled select example" name="get_ip">
        <?php 
        
        $vpnID = $_SESSION['SESSION_VPN'];
        $query_four = "SELECT ip from ip_address where vpn_id='$vpnID'";
        $result = mysqli_query($con,$query_four);
        while($row = mysqli_fetch_array($result)) {
        ?>
         <option value="<?php echo $row["ip"]; ?>">  <?php echo  $row["ip"]; ?></option>

         <?php } ?>
        </select>
        </div>

        <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Message</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="message" id="inputPassword">
    </div>
  </div>
  <button type="submit" name="ping" class="btn btn-primary">Ping IP</button>


       </form>
  </div>
</div>

</body>
</html>
