<?php

  include("./connection/config.php");
  $id = $_GET["id"];
  $result = mysqli_query($con, "DELETE FROM vpn_users WHERE user_id=$id");
  header("location:Add_VPN_users.php");





?>