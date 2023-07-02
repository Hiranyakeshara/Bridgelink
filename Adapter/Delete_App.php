<?php

  include("./connection/config.php");
  $id = $_GET["id"];
  $result = mysqli_query($con, "DELETE FROM app WHERE id=$id");
  header("location:Build_App.php");





?>