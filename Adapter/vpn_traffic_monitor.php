<?php
include("./connection/config.php");
$query_one = "SELECT count(*) as total_vpn_users_count FROM vpn_users";
$query_two = "SELECT count(*) as total_live_users FROM logged_ips WHERE logout_time IS NULL";
$result_one = mysqli_query($con, $query_one);
$result_two = mysqli_query($con, $query_two);

if ($result_one && $result_two) {
    $row_one = mysqli_fetch_assoc($result_one);
    $row_two = mysqli_fetch_assoc($result_two);
    $total_vpn_users = 254;
    $total_live_users = $row_two['total_live_users'];
    $traffic = ($total_vpn_users > 0) ? ($total_live_users / $total_vpn_users) * 100 : 0;
    $traffic_percentage = number_format($traffic, 2); // Format the traffic percentage to two decimal places
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bridge Link</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body >

   

  

                            <!-- Area Chart -->
                      
                                    <div class="chart-area"> 
                                        <!-- Area Chart goes here -->
                                  
                                        <canvas id="trafficChart"></canvas>
                                      
                                    </div>
                              


    <script>
    // Get the traffic percentage value from PHP
    var trafficPercentage = <?php echo $traffic_percentage; ?>;

    // Create the bar chart
    var ctx = document.getElementById('trafficChart').getContext('2d');
    var trafficChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Value'],
        datasets: [{
          label: 'Traffic Percentage',
          data: [trafficPercentage],
          backgroundColor: 'rgba(75, 192, 192, 0.2)',
          borderColor: 'rgba(75, 192, 192, 1)',
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            max: 100
          }
        }
      }
    });
  </script>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>

</body>

</html>
