

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bridge Link </title>
    <link rel="stylesheet" href="./css/style.css">
	
</head>
<body>
<!--
We will create a family tree using just CSS(3)
The markup will be simple nested lists
-->
<div class="container">

	<a href="../User/userlogin.php" class="btn btn-primary">Login</a>
<div class="tree">
	<ul>
		<li>
			<ul>
				<li>
				<a href="#">Users</a>
					<ul>
					<li>
							<a href="#">VPN users</a>
                            <ul>
						<li>
						<?php
                include("./connection/config.php");
        	    
                  $query ="SELECT * FROM vpn_users";
                  $sql = mysqli_query($con,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

        	?>

							<a style="background-color: #25c47f" href="#"><?php echo $row["user_name"];?> | <?php echo $row["ip"];?>
                        
                        </a>
                            
<?php } ?>
						</li>
					</ul>
                           
						</li>
						<li>
							<a href="#">Public Users</a>
                            <ul>
						<li>
						<?php
                include("./connection/config.php");
        	    
                  $query ="SELECT * FROM public_users";
                  $sql = mysqli_query($con,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

        	?>

							<a style="background-color: #73f5bd" href="#"><?php echo $row["user_name"];?>
                        
                        </a>
                            
<?php } ?>
						</li>
					</ul>
                           
						</li>
					</ul>
				</li>
                <li>
				<a href="#">Applications</a>
					<ul>
						<li>
							<a href="#">Private Applications</a>
                            <ul>
						<li>
						<?php
                include("./connection/config.php");
        	    
                  $query ="SELECT * FROM app";
                  $sql = mysqli_query($con,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

        	?>

							<a style="background-color: #25c47f" href="#"><?php echo $row["app_name"];?>
                        
                        </a>
                            
<?php } ?>
						</li>
					</ul>
                           
						</li>
						<li>
							<a href="#">Public Applications</a>
                            <ul>
						<li>
						<?php
                include("./connection/config.php");
        	    
                  $query ="SELECT * FROM public_app";
                  $sql = mysqli_query($con,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

        	?>

							<a style="background-color: #73f5bd" href="#"><?php echo $row["app_name"];?>
                        
                        </a>
                            
<?php } ?>
						</li>
					</ul>
                           
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Network Units</a>
					<ul>
				
						<li>
							<a href="#">Components</a>
							<ul>
								<li>
									<a class="btn btn-primary" href="#">Switches</a>
                                    <ul>
						<li>
						<?php
                include("./connection/config.php");
        	    
                  $query ="SELECT * FROM switch";
                  $sql = mysqli_query($con,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

        	?>

							<a style="background-color: #b5e3ff" href="#"><?php echo $row["switch_name"];?>-><?php echo $row["port_count"];?>
                        
                        </a>
                            

                            <?php }  ?> 
						</li>
					</ul>
								</li>
								<li>
									<a href="#">Routers</a>
                                    <!-- Blocked Users -->
                                    <ul>
						<li>
						<?php
                include("./connection/config.php");
        	    
                  $query ="SELECT * FROM router";
                  $sql = mysqli_query($con,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

        	?>

							<a style="background-color: #56b0e8" href="#"><?php echo $row["router_name"];?>-><?php echo $row["device_count"];?>
                        
                        </a>
                            

                            <?php }  ?> 
                          
                            
						</li>
					</ul>
								</li>
								<li>
									<a href="#">Registered End-Points</a>
                                     <!-- Registered Users -->
                                    <ul>
						<li >
                            
                        <?php
                include("./connection/config.php");
        	    
                  $query ="SELECT * FROM endpoints";
                  $sql = mysqli_query($con,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

        	?>

							<a style="background-color: white;" href="#"><?php echo $row["device_name"];?>-><?php echo $row["ip"];?>
                        
                        </a>
                            

                            <?php }  ?> 
						</li>
					</ul>
								</li>
							</ul>
						</li>
						<li><a href="#">VPN </a>
                        <ul>
								<li>
									<a href="#">VPN Count</a>
									<ul>
						<li >
                            
                        <?php
                include("./connection/config.php");
        	    
                  $query ="SELECT * FROM vpn";
                  $sql = mysqli_query($con,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

        	?>

							<a style="background-color: #e8a790;" href="#"><?php echo $row["vpn_name"];?> 
                        
                        </a>
                            

                            <?php }  ?> 
						</li>
					</ul>
								</li>
								<li>
									<a href="#">VPN Users</a>
									<ul>
						<li >
                            
                        <?php
                include("./connection/config.php");
        	    
                  $query ="SELECT * FROM vpn_users";
                  $sql = mysqli_query($con,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

        	?>

							<a style="background-color: #c45025;" href="#"><?php echo $row["user_name"];?>-><?php echo $row["ip"];?>
                        
                        </a>
                            

                            <?php }  ?> 
						</li>
					</ul>
								</li>
							</ul>
                            </li>
					</ul>
				</li>
			</ul>
		</li>
       
	</ul>

    
</div>
</div>
</body>

</html>