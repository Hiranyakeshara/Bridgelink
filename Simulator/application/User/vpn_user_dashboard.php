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

// Capture IP address, country, login time, and user agent
$ipAddress = $_SERVER['REMOTE_ADDR'];
$loginTime = date('Y-m-d H:i:s');
$userAgent = $_SERVER['HTTP_USER_AGENT'];

// Get country from IP address
$country = getCountryFromIP($ipAddress);

// Get browser name from user agent
$browserName = getBrowserName($userAgent);

// Log server traffic with browser information
$logData = "IP: $ipAddress | Country: $country | Time: $loginTime | Browser: $browserName";
file_put_contents('server_traffic.log', $logData . PHP_EOL, FILE_APPEND);

if (isset($_POST["ping"])) {
    // Post all values
    extract($_POST);
    $username = $_SESSION['SESSION_USERNAME'];
    $query = "INSERT INTO `ping` (`id`, `username`, `get_ip`, `message`) VALUES (NULL, '".$username."','".$get_ip."', '".$message."');";

    mysqli_query($con, $query);
    header("location:vpn_user_dashboard.php");
}

// Store IP address, country, login time, and browser name in the database
$username = $_SESSION['SESSION_USERNAME'];
$query = "INSERT INTO `logged_ips` (`id`, `username`, `ip_address`, `country`, `login_time`, `browser_name`) VALUES (NULL, '$username', '$ipAddress', '$country', '$loginTime', '$browserName');";
mysqli_query($con, $query);

// Function to get country from IP address
function getCountryFromIP($ip)
{
    $geolocation = json_decode(file_get_contents("https://ipapi.co/{$ip}/json/"));
    return $geolocation->country ?? '';
}

// Function to get browser name from user agent
function getBrowserName($userAgent)
{
    $browser = "Unknown";

    if (preg_match('/MSIE/i', $userAgent) && !preg_match('/Opera/i', $userAgent)) {
        $browser = 'Internet Explorer';
    } elseif (preg_match('/Firefox/i', $userAgent)) {
        $browser = 'Mozilla Firefox';
    } elseif (preg_match('/Chrome/i', $userAgent)) {
        $browser = 'Google Chrome';
    } elseif (preg_match('/Safari/i', $userAgent)) {
        $browser = 'Apple Safari';
    } elseif (preg_match('/Opera/i', $userAgent)) {
        $browser = 'Opera';
    } elseif (preg_match('/Netscape/i', $userAgent)) {
        $browser = 'Netscape';
    }

    return $browser;
}

// Retrieve live login users from the database
$query_live_users = "SELECT * FROM logged_ips WHERE logout_time IS NULL";
$result_live_users = mysqli_query($con, $query_live_users);

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
    <h1>You Are Logged in as VPN User</h1>
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
        $result = mysqli_query($con, $query_two);
        while ($row = mysqli_fetch_array($result)) {
        ?>
          <a href="<?php echo $row["app_link"]; ?>" class="btn btn-primary"><?php echo $row["app_name"]; ?></a>
        <?php } ?>
      </div>
      <div class="col-sm-4">
        <h3>Public Applications</h3>
        <?php
        include("./config.php");
        $query_three = "SELECT * FROM public_app ";
        $result = mysqli_query($con, $query_three);
        while ($row = mysqli_fetch_array($result)) {
        ?>
          <a href="<?php echo $row["link"]; ?>" class="btn btn-warning"><?php echo $row["app_name"]; ?></a>
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
              $result = mysqli_query($con, $query_four);
              while ($row = mysqli_fetch_array($result)) {
              ?>
                <option value="<?php echo $row["ip"]; ?>"> <?php echo  $row["ip"]; ?></option>

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
  </div>

  <div class="container mt-5">
    <h3>Live Login Users</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Username</th>
          <th>IP Address</th>
          <th>Country</th>
          <th>Login Time</th>
          <th>Browser Name</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row_live_users = mysqli_fetch_array($result_live_users)) { ?>
          <tr>
            <td><?php echo $row_live_users['username']; ?></td>
            <td><?php echo $row_live_users['ip_address']; ?></td>
            <td><?php echo $row_live_users['country']; ?></td>
            <td><?php echo $row_live_users['login_time']; ?></td>
            <td><?php echo $row_live_users['browser_name']; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

</body>

</html>
