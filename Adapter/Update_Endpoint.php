<?php
// including the database connection file
include_once("./connection/config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email'];    
    
    
        $result = mysqli_query($connect, "UPDATE users SET name='$name', age='$age',email='$email' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: fetch.php");
    
}
?>
<?php
//error_reporting(0);
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM users WHERE id=$id");
 
while($row = mysqli_fetch_array($result))
{
    $name = $row['name'];
    $age = $row['age'];
    $email = $row['email'];
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
    <h3>PHP Weblesson | Add Delete Update  In PHP</h3>
    <h4><b style="color: red;">Please Subscribe My Youtube Channel</b></h4><hr>
			<div class="col-sm-6"> 
	
	<form action="" method="post" name="form1">
		<div class="form-group">
				
				<input type="hidden" name="name" class="form-control" value="<?php echo $id;?>">
			
		</div>
		<div class="form-group">
				<label>VPN Name</label>
				<input type="text" name="name" class="form-control" value="<?php echo $vpn_name;?>">
			
		</div>
			   <div class="form-group">
				<label>Start IP</label>
				<input type="text" name="age" class="form-control" value=" <?php echo $start_ip; ?>">
			</div>
			 <div class="form-group">
				<label>End IP</label>
				<input type="text" name="email" class="form-control" value="<?php echo $end_ip;?>">
			  </div>
              <div class="form-group">
				<label>User Capacity</label>
				<input type="text" name="email" class="form-control" value="<?php echo $user_capacity;?>">
			  </div>
				<div class="form-group">
				<input type="submit" name="Submit" value="Update" class="btn btn-primary btn-block" name="update">
			
		
	</form>

</div>
</div>
</div>
</body>
</html>

