<?php

  include("./connection/config.php");
  $id = $_GET["id"];
  $result = mysqli_query($con, "DELETE FROM public_users WHERE puser_id=$id");
  header("location:Add_Public_users.php");





?>