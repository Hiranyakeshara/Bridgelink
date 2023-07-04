

<?php
session_start();

if (isset($_SESSION['SESSION_USERNAME'])) {
    // User is logged in
    echo "User is logged in";

} else {
    // User is not logged in
    echo "User is not logged in";
    header("Location: login.php");
}
?>




<!DOCTYPE html>
<html>
<head>
  <title>IP Address Chart</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <canvas id="chart"></canvas>

  <script>
    <?php
      // Assuming you have established a database connection
      include_once("./connection/config.php");
      // Fetch data from the ip_address table
      $query = "SELECT ip, vpn_name FROM ip_address INNER JOIN vpn ON ip_address.vpn_id = vpn.id";
      $result = mysqli_query($connection, $query);

      // Store the data in arrays
      $ips = array();
      $vpnNames = array();

      while ($row = mysqli_fetch_assoc($result)) {
          $ips[] = $row['ip'];
          $vpnNames[] = $row['vpn_name'];
      }

      // Convert the arrays to JSON for JavaScript
      $ipsJson = json_encode($ips);
      $vpnNamesJson = json_encode($vpnNames);
    ?>

    var ips = <?php echo $ipsJson; ?>;
    var vpnNames = <?php echo $vpnNamesJson; ?>;

    var ctx = document.getElementById('chart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ips,
        datasets: [{
          label: 'VPN Name',
          data: vpnNames,
          backgroundColor: 'rgba(75, 192, 192, 0.6)',
        }]
      },
      options: {
        responsive: true,
        scales: {
          x: {
            title: {
              display: true,
              text: 'IP Address'
            }
          },
          y: {
            title: {
              display: true,
              text: 'VPN Name'
            }
          }
        }
      }
    });
  </script>
</body>
</html>
