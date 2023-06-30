<?php
// including the database connection file
include_once("./connection/config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $vpn_name=$_POST['vpn_name'];
    $start_ip=$_POST['start_ip'];
	$end_ip=$_POST['end_ip'];
    $user_capacity=$_POST['user_capacity'];    
    
    
        $result = mysqli_query($con, "UPDATE vpn SET vpn_name='$vpn_name', start_ip='$start_ip', end_ip='$end_ip', user_capacity='$user_capacity'  WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: Add_VPN.php");
    
}
?>
<?php
//error_reporting(0);
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM vpn WHERE id=$id");
 
while($row = mysqli_fetch_array($result))
{
    $vpn_name = $row['vpn_name'];
	$start_ip=$row['start_ip'];
	$end_ip=$row['end_ip'];
    $user_capacity=$row['user_capacity'];    
 
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
    <h3>Update VPN</h3>

			<div class="col-sm-6"> 
	<form action="" method="post" name="form1">
		<div class="form-group">
				
				<input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">
			
		</div>
		<div class="form-group">
				<label>VPN Name</label>
				<input type="text" name="vpn_name" class="form-control" value="<?php echo $vpn_name;?>">
			
		</div>
			   <div class="form-group">
				<label>Start IP</label>
				<input type="text" name="start_ip" class="form-control" value=" <?php echo $start_ip; ?>">
			</div>
			 <div class="form-group">
				<label>End IP</label>
				<input type="text" name="end_ip" class="form-control" value="<?php echo $end_ip;?>">
			  </div>
              <div class="form-group">
				<label>User Capacity</label>
				<input type="text" name="user_capacity" class="form-control" value="<?php echo $user_capacity;?>">
			  </div>
				<div class="form-group">
				<input type="submit" value="Update" class="btn btn-primary btn-block" name="update">
			
		
	</form>
	<a href="./Add_VPN.php">Back</a>

</div>
</div>
</div>
</body>
</html>

