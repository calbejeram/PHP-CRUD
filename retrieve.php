<?php
  require("./connection/config.php");

  // Sorting
  $col = "ID";
  $sort = "ASC";

  if (isset($_GET['column'], ($_GET['sortorder']))) {
    $col = $_GET['column'];
    $sort = $_GET['sortorder'];

    $sort == "ASC"
      ? $sort = "DESC"
      : $sort = "ASC";
  };

  // Retrieval
  $query = "SELECT * FROM PEOPLE ORDER BY $col $sort";

  $result = mysqli_query($connection, $query);

?>
