<?php
// including the database connection file
include_once("./connection/config.php");
 
// Retrieve the available VPNs from the database
$query = "SELECT * FROM vpn";
$vpnResult = mysqli_query($con, $query);


if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $app_name= $_POST['app_name'];
	$vpn_namet= $_POST['vpn_name'];
    $applink= $_POST['app_link'];

    $result = mysqli_query($con, "UPDATE app SET app_name='$app_name', vpn_name='$vpn_name', app_link='$applink'  WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: Build_App.php");
    
}
?>
<?php
//error_reporting(0);
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM app WHERE id=$id");
 
while($row = mysqli_fetch_array($result))
{
    $app_name= $row['app_name'];
	$vpn_namet= $row['vpn_name'];
    $applink= $row['app_link'];   
 
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
    <h3>Update Application</h3>

			<div class="col-sm-6"> 
	<form action="" method="post" name="form1">
		<div class="form-group">
				
				<input type="hidden" name="id" class="form-control" value="<?php echo $id;?>">
			
		</div>
		<div class="form-group">
				<label>Application Name</label>
				<input type="text" name="app_name" class="form-control" value="<?php echo $app_name; ?>">
		</div>
		<div class="form-group">
                    <?php 
                        include("./connection/config.php");
                        $query = "SELECT * FROM vpn";
                        $vpnResult = mysqli_query($con, $query);
                    ?>
				<label>Select Appplication VPN</label>
				<select class="form-select" aria-label="Default select example" name="vpn_id">
                    <?php
                        // Generate the options dynamically
                            while ($row = mysqli_fetch_array($vpnResult)) {
                                $vpnId = $row['vpn_id'];
                                $vpnName = $row['vpn_name'];
                                echo "<option value=\"$vpnId\">$vpnName</option>";
                                }
                    ?>
                /select>
		</div>
		<div class="form-group">
				<label>Application Link</label>
				<input type="text" name="app_link" class="form-control" value="<?php echo $applink;?>">
		</div>
		<div class="form-group">

				<input type="submit" value="Update" class="btn btn-primary btn-block" name="update">
			
		
	</form>
	<a href="./Build_App.php">Back</a>

</div>
</div>
</div>
</body>
</html>
