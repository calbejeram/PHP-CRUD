<?php
  // Connection Configuration
  require('./connection/config.php');

  if (isset($_POST['create'])) {
    $fldFirstName = $_POST['firstname'];
    $fldLastName = $_POST['lastname'];
    $fldEmail = $_POST['email'];
    $fldPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $fldGender = $_POST['gender'];
    $fldAccess = $_POST['access'];

    $query = "INSERT INTO PEOPLE (FIRST_NAME, LAST_NAME, EMAIL, PASSWORD, GENDER, ACCESS) VALUES('$fldFirstName', '$fldLastName', '$fldEmail', '$fldPassword', '$fldGender', '$fldAccess')";

    $result = mysqli_query($connection, $query) || trigger_error("Query failed $query " . mysqli_error($connection), E_USER_ERROR);

    echo "<script>alert('User successfully created')</script>";
    echo "<script>window.location.href = './index.php'</script>";
  } else {
    echo "<script>window.location.href = './index.php'</script>";
  }
?>
