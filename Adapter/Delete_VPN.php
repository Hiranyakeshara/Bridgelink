
<?php

  include("./connection/config.php");
  $id = $_GET["id"];
  $result = mysqli_query($con, "DELETE FROM vpn WHERE id=$id");
  header("location:Add_VPN.php");





?>