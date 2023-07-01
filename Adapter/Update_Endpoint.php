<?php
// including the database connection file
include_once("./connection/config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $device_name=$_POST['device_name'];
    $basenetwork=$_POST['basenetwork'];
    $ip=$_POST['ip'];
    $vpnid=$_POST['vpn_id'];
	$vpnname=$_POST['vpn_name'];
    $device_type=$_POST['device_type'];
	
        $result = mysqli_query($con, "UPDATE users SET device_name='$device_name', basenetwork='$basenetwork', ip='$ip', vpn_id='$vpnid' , vpn_name='$vpnname', device_type='$device_type'  WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: Add_Endpoints.php");
    
}
?>
<?php
//error_reporting(0);
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM users WHERE id=$id");
 
while($row = mysqli_fetch_array($result))
{
    $device_name= $row['device_name'];
    $basenetwork= $row['basenetwork'];
    $ip= $row['ip'];
    $vpnid= $row['vpn_id'];
	$vpnname= $row['vpn_name'];
    $device_type= $row['device_type']; 

}
?>
<html>
<head>
	<title>Add Data</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container" style="width: 800px; margin-top: 100px;">
		<div class="row">
    <h3>Update Endpoint</h3>

			<div class="col-sm-6"> 
	<form action="" method="post" name="form1">
		<div class="form-group">
				
				<input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">
			
		</div>
		<div class="form-group">
				<label>Device Name</label>
				<input type="text" name="device_name" class="form-control" value="<?php echo $device_name;?>">
			
		</div>
			   <div class="form-group">
				<label>Base IP</label>
				<input type="text" name="basenetwork" class="form-control" value=" <?php echo $basenetwork; ?>">
			</div>
			 <div class="form-group">
				<label>IP Address</label>
				<input type="text" name="ip" class="form-control" value="<?php echo $ip;?>">
			  </div>
              <div class="form-group">
				<label>Department</label>
				<input type="text" name="vpn_id" class="form-control" value="<?php echo $vpnid;?>">
			  </div>
              <div class="form-group">
				<label>Select VPN</label>
				<input type="text" name="vpn_name" class="form-control" value="<?php echo $vpnname;?>">
			  </div>
			  <div class="form-group">
				<label>Select Device Type</label>
				<input type="text" name="device_type" class="form-control" value="<?php echo $device_type;?>">
			</div>

				<div class="form-group">
				<input type="submit" value="Update" class="btn btn-primary btn-block" name="update">
			
		
	</form>
	<a href="./Add_Endpoints.php">Back</a>

</div>
</div>
</div>
</body>
</html>

