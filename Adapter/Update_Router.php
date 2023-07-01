<?php
// including the database connection file
include_once("./connection/config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $router_name= $_POST['router_name'];
    $router_type= $_POST['router_type'];
	$devicecount= $_POST['device_count'];
   
        $result = mysqli_query($con, "UPDATE router SET router_name='$router_name', router_type='$router_type', device_count='$devicecount'  WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: Add_Router.php");
    
}
?>
<?php
//error_reporting(0);
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM router WHERE id=$id");
 
while($row = mysqli_fetch_array($result))
{
    $router_name= $row['router_name'];
    $router_type= $row['router_type'];
	$devicecount= $row['device_count'];    
 
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
    <h3>Update Router</h3>

			<div class="col-sm-6"> 
	<form action="" method="post" name="form1">
		<div class="form-group">
				
				<input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">
			
		</div>
		<div class="form-group">
				<label>Router Name</label>
				<input type="text" name="router_name" class="form-control" value="<?php echo $router_name;?>">
			
		</div>
			   <div class="form-group">
				<label>Router Type</label>
				<input type="text" name="router_type" class="form-control" value=" <?php echo $router_type; ?>">
			</div>
			 <div class="form-group">
				<label>Device count</label>
				<input type="text" name="device_count" class="form-control" value="<?php echo $devicecount;?>">
			  </div>
				<div class="form-group">
				<input type="submit" value="Update" class="btn btn-primary btn-block" name="update">
			
		
	</form>
	<a href="./Add_Router.php">Back</a>

</div>
</div>
</div>
</body>
</html>

