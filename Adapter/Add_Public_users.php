<?php
include("./connection/config.php");

if (isset($_POST["submit"])) {
    // Post all values
    extract($_POST);
    $query = "INSERT INTO `public_users` (`puser_id`, `user_name`, `password`) VALUES (NULL, '".$user_name."', '".$password."');";
    mysqli_query($con, $query);
    header("location:Add_Public_users.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Network Admin - Controller</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <div id="wrapper">
        <!-- Sidebar -->
        <?php include_once('../Adapter/components/sidenav/sidbar.php'); ?>
        <!-- End of Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include_once('../Adapter/components/header/topbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Add Public Users</h1>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Enter User Details</h6>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label for="device_name" class="form-label">User Name</label>
                                            <input type="text" class="form-control" name="user_name" id="device_name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="device_type" class="form-label">Password</label>
                                            <input type="" class="form-control" name="password" id="device_type">
                                        </div>
                                   
                                        <button type="submit" name="submit" class="btn btn-primary">Add Public User</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Update VPN User Details</h6>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>

                                        <tr>
                                            <th>User Name</th>
                                            <th>Password</th>

                                            <th>Action Buttons</th>
                                      
                                        </tr>
                                    </thead>
                                    <tbody>
                    <?php
                    include("./connection/config.php");
                    $query ="SELECT * FROM public_users";
                    $sql = mysqli_query($con,$query);
                    while($row = mysqli_fetch_array($sql))
                    {
                       
                    ?>
                                           <tr>
                                                <td><?php echo $row["user_name"];?></td>
                                                <td><?php echo $row["password"];?></td>
                                                <td><a  href="Update_Endpoint.php?id=<?php echo $row['puser_id']; ?>" class="btn btn-primary" >Update</a>
                                                <a href="Delete_Endpoint.php?id=<?php echo $row['puser_id']; ?>" class="btn btn-warning" >Delete</a></td>
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

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>
