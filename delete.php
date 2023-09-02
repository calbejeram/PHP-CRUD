<?php
  require('./connection/config.php');

  if (isset($_POST['delete'])) {
    $id = $_POST['account_id'];

    $query = "DELETE FROM PEOPLE WHERE ID = $id";

    $result = mysqli_query($connection, $query);

    echo "<script>alert('Successfully deleted')</script>";

    header("location: index.php");
  } else {
    header("location: index.php");
  }

  /*
    For Editing, use input type="hidden"
    Create edit.php with a populated form based on the ID
    The form action is self
    The edit button will execute the script to update the entry in the database
  */
?>
