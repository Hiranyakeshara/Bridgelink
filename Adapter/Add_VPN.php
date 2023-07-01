<?php   
  include("./connection/config.php");
  if(isset($_POST["submit"]))
  {
      //post all value
      extract($_POST);
      $query = "INSERT INTO `vpn` (`vpn_id`, `vpn_name`,`start_ip`, `end_ip`, `user_capacity`) VALUES (NULL, '".$vpn_name."', '".$startip."','".$endip."', '".$usercapacity."');";

      mysqli_query($con,$query);
      header("location:Add_VPN.php");
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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once('../Adapter/components/sidenav/sidbar.php') ;   ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once('../Adapter/components/header/topbar.php') ;   ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Add VPN End-Points</h1>

                    <div class="row">

                        <div class="col-lg-6">

                            <!-- Circle Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary"> VPN Adding form</h6>
                                </div>
                                <div class="card-body">
 <!-- Add Endpoints form -->
                                <form action="Add_VPN.php" method="post">
                                <div class="mb-3">
                                    <label for="vpnname" class="form-label">VPN Name</label>
                                    <input type="text" class="form-control" name="vpn_name" id="vpnname" >
                                </div>
                                <div class="mb-3">
                                    <label for="startipaddress" class="form-label">Start IP address</label>
                                    <input type="text" class="form-control" name="startip" id="startip">
                                </div>
                                <div class="mb-3">
                                    <label for="endipaddress" class="form-label">End IP address</label>
                                    <input type="text" name="endip" class="form-control" id="endip" >
                                </div>
                                <div class="mb-3">
                                    <label for="usercapacity" class="form-label">User Capacity</label>
                                    <input type="text" name="usercapacity"  class="form-control" id="usercapacity" >
                                </div>
                               
                                <button type="submit" name="submit" class="btn btn-primary">Add VPN</button>
                                </form>
 <!-- End of Add Endpoints form -->
                                </div>
                            </div>

                            <!-- Brand Buttons -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">End-Points Coonectivity</h6>
                                </div>
                                <div class="card-body">
                                 

                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Configure VPNS Here</h6>
                                </div>
                                <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                    
                                        <tr>
                                            <th>VPN Name</th>
                                            <th>Start IP address</th>
                                            <th>End IP address</th>
                                            <th>User Capacity</th>
                                            <th>Action Buttons</th>
                                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
        	      include("./connection/config.php");
                  $query ="SELECT * FROM vpn";
                  $sql = mysqli_query($con,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

        	?>
                                        <tr>
                                            <td><?php echo $row["vpn_name"];?></td>
                                            <td><?php echo $row["start_ip"];?></td>
                                            <td><?php echo $row["end_ip"];?></td>
                                            <td><?php echo $row["user_capacity"];?></td>
                                            <td><a  href="Update_VPN.php?id=<?php echo $row['vpn_id']; ?>" class="btn btn-primary" >Update</a>
                                            <a href="Delete_VPN.php?id=<?php echo $row['vpn_id']; ?>" class="btn btn-warning" >Delete</a></td>
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
            <?php include_once('../Adapter/components/footer/footer.php') ;   ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>