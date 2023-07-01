<?php
include("./connection/config.php");

// Retrieve the available VPNs from the database
$query = "SELECT * FROM vpn";
$vpnResult = mysqli_query($con, $query);

if (isset($_POST["submit"])) {
    // Post all values
    extract($_POST);

    // Insert the new user into the database
    $insertQueryone = "INSERT INTO `vpn_users` (`user_id`, `user_name`,  `vpn_id`,  `password` ) VALUES (NULL, '$user_name', '$vpn_id', '$password')";
    mysqli_query($con, $insertQueryone);
    header("location:Add_VPN_users.php");
} 

?>

<?php 

include("./connection/config.php");
if (isset($_POST["addip"])) {
    // Post all values
    extract($_POST);

    // Insert the new user into the database
    $insertQuery = "INSERT INTO `ip_address` (`ip_id`,  `vpn_id`, `base_network`,  `ip` ) VALUES (NULL, '$vpn_id', '$basenetwork','$ip')";
    mysqli_query($con, $insertQuery);
    header("location:Add_VPN_users.php");
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
    <title>Network Admin - Controller</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include_once('../Adapter/components/sidenav/sidbar.php'); ?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include_once('../Adapter/components/header/topbar.php'); ?>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Add VPN users</h1>
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Enter User Details</h6>
                                </div>
                                <div class="card-body">
                                    <!-- Add VPN_users form -->

                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label for="devicename" class="form-label">User Name</label>
                                            <input type="text" class="form-control" name="user_name" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="devicename" class="form-label">Select VPN</label>
                                            <select class="form-select" aria-label="Default select example" name="vpn_id">
                                                <?php
                                                // Generate the options dynamically
                                                while ($row = mysqli_fetch_array($vpnResult)) {
                                                    $vpnId = $row['vpn_id'];
                                                    $vpnName = $row['vpn_name'];
                                                    echo "<option value=\"$vpnId\">$vpnName</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="Ipaddress">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary">Add VPN User</button>
                                    </form>

                                    <!-- End of Add VPN form -->
                                </div>
                            </div>

                            <!-- Brand Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Add IP to VPN</h6>
                                </div>
                                <div class="card-body">
                                         <form action="" method="post">
                                        <div class="mb-3">
                                            <?php 
                                            include("./connection/config.php");
                                        $query = "SELECT * FROM vpn";
                                        $vpnResult = mysqli_query($con, $query);

?>                                      <label for="vpn name" class="form-label">Select VPN</label>
                                        <select class="form-select" aria-label="Default select example" name="vpn_id" id="vpnSelect">
                                                <?php
                                                // Generate the options dynamically
                                                while ($row = mysqli_fetch_array($vpnResult)) {
                                                    $vpnId = $row['vpn_id'];
                                                    $vpnName = $row['vpn_name'];
                                                    echo "<option value=\"$vpnId\">$vpnName</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="devicename" class="form-label">Base Network </label>
                                            <input type="text" class="form-control" name="basenetwork" >
                                        </div>

                                        <div class="mb-3">
                                            <label for="devicename" class="form-label">IP address </label>
                                            <input type="text" class="form-control" name="ip" id="devicename">
                                        </div>
                                        <button type="submit" name="addip" class="btn btn-primary">Add IP</button>

                                        </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Update VPN user details</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>User Name</th>
                                                    <th>VPN ID</th>
                                                    <th>VPN Name</th>
                                                    <th>IP address</th>
                                                    <th>Password</th>
                                                    <th>Action Buttons</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                $query = "SELECT * FROM vpn_users";
                                $sql = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_array($sql)) {
                                     $vpnID = $row["vpn_id"];
                             $query = "SELECT vpn_name FROM vpn WHERE vpn_id = '$vpnID'";
                             $vpnResult = mysqli_query($con, $query);
                             $vpnRow = mysqli_fetch_array($vpnResult);
                            $vpnName = $vpnRow["vpn_name"];
                                    ?>
                    <tr>
                       <td><?php echo $row["user_name"]; ?></td>
                      <td><?php echo $row["vpn_id"]; ?></td>
                         <td><?php echo $vpnName; ?></td>
        <td><?php echo $row["ip"]; ?></td>
        <td><?php echo $row["password"]; ?></td>
        <td>
            <a href="Update_Endpoint.php?id=<?php echo $row['user_id']; ?>" class="btn btn-primary">Update</a>
            <a href="Delete_Endpoint.php?id=<?php echo $row['user_id']; ?>" class="btn btn-warning">Delete</a>
        </td>
    </tr>
<?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <?php include_once('../Adapter/components/footer/footer.php'); ?>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>
