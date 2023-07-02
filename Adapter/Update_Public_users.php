<?php
// including the database connection file
include_once("./connection/config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['puser_id'];
    $user_name= $_POST['user_name'];
    $password= $_POST['password'];
   
        $result = mysqli_query($con, "UPDATE public_users SET user_name='$user_name', password='$password' WHERE puser_id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: Add_Public_users.php");
    
}
?>
<?php
//error_reporting(0);
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM public_users WHERE puser_id=$id");
 
while($row = mysqli_fetch_array($result))
{
    $user_name= $row['user_name'];
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

<body>
	<div class="container" style="width: 800px; margin-top: 100px;">
		<div class="row">
    <h3>Update Router</h3>

			<div class="col-sm-6"> 
	<form action="" method="post" name="form1">
		    <div class="form-group">
				<input type="hidden" name="puser_id" class="form-control" value="<?php echo $id;?>">
		    </div>
		    <div class="form-group">
				<label>User Name</label>
				<input type="text" name="user_name" class="form-control" value="<?php echo $user_name;?>">
		    </div>
		    <div class="form-group">
				<label>Password</label>
				<input type="text" name="password" class="form-control" value=" <?php echo $password; ?>">
			</div>
				<div class="form-group">
				<input type="submit" value="Update" class="btn btn-primary btn-block" name="update">
			
	</form>
	        <a href="./Add_Public_users.php">Back</a>

            </div>
        </div>
    </div>
</body>
</html>

