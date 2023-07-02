<?php
// including the database connection file
include_once("./connection/config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['user_id'];
    $user_name=$_POST['user_name'];
    $vpn_id=$_POST['vpn_id'];
    $password=$_POST['password'];
   
	
        $result = mysqli_query($con, "UPDATE vpn_users SET user_name='$user_name', vpn_id='$vpn_id', password='$password'  WHERE user_id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: Add_VPN_users.php");
    
}
?>
<?php
//error_reporting(0);
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM vpn_users WHERE user_id=$id");
 
while($row = mysqli_fetch_array($result))
{
    $user_name= $row['user_name'];
    $vpn_id= $row['vpn_id'];
    $password= $row['password'];

}
?>

<html>
<head>
	<title>Add Data</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<!-- not done any after this-->
<body>
	<div class="container" style="width: 800px; margin-top: 100px;">
		<div class="row">
            <h3>Update VPN User</h3>
			    
                <div class="col-sm-6"> 
	                <form action="" method="post" name="form1">
		            <div class="form-group">
				        <input type="hidden" name="user_id" class="form-control" value="<?php echo $id;?>">
		            </div>
		            <div class="form-group">
				        <label>User Name</label>
				        <input type="text" name="user_name" class="form-control" value="<?php echo $user_name;?>">
		            </div>
			        <div class="form-group">
								<?php 
                                    include("./connection/config.php");
                                    $query = "SELECT * FROM vpn";
                                    $vpnResult = mysqli_query($con, $query);

                                ?>
				        <label>Select VPN </label>
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
			        <div class="form-group">
				        <label>Password</label>
				        <input type="text" name="password" class="form-control" value="<?php echo $password;?>">
			        </div>
                   

				    <div class="form-group">
				        <input type="submit" value="Update" class="btn btn-primary btn-block" name="update">
			
	                </form>
	                    <a href="./Add_VPN_users.php">Back</a>
                    </div>
                </div>
        </div>
    </div>

</body>

</html>

