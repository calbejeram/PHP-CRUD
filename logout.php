<?php
  require("./connection/config.php");

  session_start();

  $_SESSION["status"] = "invalid";

  // Unsets the specified variable
  unset($_SESSION["EMAIL"]);

  // Close the database connection using the variable from the connection configuration
  mysqli_close($connection);

  // Destroy the session
  session_destroy();

  // Redirect to login when the session variable is destroyed
  echo "<script>window.location.href='./login.php'</script>";
?>