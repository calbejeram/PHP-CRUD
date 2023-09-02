<?php
  // Session - stores information in variables which can be used in multiple pages
  session_start();

  if ($_SESSION["status"] == "invalid" || empty($_SESSION["status"])) {
    $_SESSION["status"] = "invalid";
    
    // Unsets the specified variable
    unset($_SESSION["EMAIL"]);

    // Redirect to login when the session variable is destroyed
    echo "<script>window.location.href='./login.php'</script>";
  }
?>
