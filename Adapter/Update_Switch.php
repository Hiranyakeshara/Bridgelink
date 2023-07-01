<?php
// including the database connection file
include_once("./connection/config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $switch_name=$_POST['switch_name'];
    $switch_type=$_POST['switch_type'];
	$portcount=$_POST['port_count'];
    
    
        $result = mysqli_query($con, "UPDATE switch SET switch_name='$switch_name', switch_type='$switch_type', port_count='$portcount'  WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: Add_Switch.php");
    
}
?>
<?php
//error_reporting(0);
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM switch WHERE id=$id");
 
while($row = mysqli_fetch_array($result))
{
    $switch_name= $row['switch_name'];
    $switch_type= $row['switch_type'];
	$portcount= $row['port_count'];

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
    <h3>Update Switch</h3>

			<div class="col-sm-6"> 
	<form action="" method="post" name="form1">
		<div class="form-group">
				
				<input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">
			
		</div>
		<div class="form-group">
				<label>Switch Name</label>
				<input type="text" name="switch_name" class="form-control" value="<?php echo $switch_name;?>">
			
		</div>
			   <div class="form-group">
				<label>Switch Type</label>
				<input type="text" name="switch_type" class="form-control" value=" <?php echo $switch_type; ?>">
			</div>
			 <div class="form-group">
				<label>Port Count</label>
				<input type="text" name="port_count" class="form-control" value="<?php echo $portcount;?>">
			  </div>
				<div class="form-group">
				<input type="submit" value="Update" class="btn btn-primary btn-block" name="update">
			
		
	</form>
	<a href="./Add_Switch.php">Back</a>

</div>
</div>
</div>
</body>
</html>

