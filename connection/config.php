<?php
  define("DB_SERVER", "localhost");
  define("DB_USER", "root");
  define("DB_PASSWORD", "");   // Make sure to put the correct password
  define("DB_NAME", "phpcrud");
  define("DB_PORT", 3307);     // Make sure to check your assigned port

  $connection = mysqli_connect(
    DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT
  );

  // Check the connection
  if (mysqli_connect_error()) {
    echo "Unable to connect to MySQL";
    echo mysqli_connect_error();
  }
?>
