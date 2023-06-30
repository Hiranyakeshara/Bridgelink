

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
    <a href="../User/" >Back to Portal</a>
<div class="tree">
	<ul>
		<li>
			<a href="#">Network Switch</a>
			<ul>
				<li>
				<a href="#">Routers</a>
					<ul>
						<li>
							<a href="#">Grand Child</a>
                            <a href="#">Grand Child</a>
                            <a href="#">Grand Child</a>
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
							<a href="#">Grand Child</a>
                            <a href="#">Grand Child</a>
                            <a href="#">Grand Child</a>
						</li>
					</ul>
                           
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Network Users</a>
					<ul>
				
						<li>
							<a href="#">Public Users</a>
							<ul>
								<li>
									<a href="#">Live Users</a>
                                    <ul>
						<li>
							<a href="#">Grand Child</a>
                            <a href="#">Grand Child</a>
                            <a href="#">Grand Child</a>
						</li>
					</ul>
								</li>
								<li>
									<a href="#">Blocked Users</a>
                                    <!-- Blocked Users -->
                                    <ul>
						<li>
							<a href="#">Grand Child</a>
                            <a href="#">Grand Child</a>
                            <a href="#">Grand Child</a>
                            <a href="#">Grand Child</a>
                          
                            
						</li>
					</ul>
								</li>
								<li>
									<a href="#">Registered Users</a>
                                     <!-- Registered Users -->
                                    <ul>
						<li>
                            
                        <?php
                include("./connection/config.php");
        	    
                  $query ="SELECT * FROM users";
                  $sql = mysqli_query($con,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

        	?>

							<a href="#"><?php echo $row["device_name"];?>-><?php echo $row["ip"];?>
                        
                        </a>
                            

                            <?php }  ?> 
						</li>
					</ul>
								</li>
							</ul>
						</li>
						<li><a href="#">VPN users</a>
                        <ul>
								<li>
									<a href="#">VPN live Users</a>
								</li>
								<li>
									<a href="#">VPN created</a>
								</li>
							</ul>
                            </li>
					</ul>
				</li>
			</ul>
		</li>
        <li>
			<a href="#">Public Network</a>
        
		</li>
	</ul>

    
</div>
</div>
</body>

</html>