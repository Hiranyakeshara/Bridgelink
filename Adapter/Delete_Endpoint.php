<?php

  include("./connection/config.php");
  $id = $_GET["id"];
  $result = mysqli_query($con, "DELETE FROM users WHERE id=$id");
  header("location:Add_Endpoint.php");





?>