<?php
  require("./connection/config.php");
  
  // Session - stores information in variables which can be used in multiple pages
  session_start();

  if ($_SESSION["status"] == "invalid" || empty($_SESSION["status"])) {
    $_SESSION["status"] = "invalid";
  } else {
    echo "<script>window.location.href='./index.php'</script>";
  };

  if (isset($_POST["LOGIN"])) {
    $email = trim($_POST["EMAIL"]);
    $password = trim($_POST["PASSWORD"]);

    if (empty($email) || empty($password)) {
      echo "<script>alert('Please fill out all the fields')</script>";
    } else {
      $query = "SELECT * FROM PEOPLE WHERE EMAIL = '$email'";

      $result = mysqli_query($connection, $query);

      $rowValidate = mysqli_fetch_array($result);

      // Validate if Password matches the records or not
      if (password_verify($password, $rowValidate["PASSWORD"])) {
        $_SESSION["status"] = "valid";
        $_SESSION['sessionEmail'] = $email;
        $_SESSION['sessionAccess'] = $rowValidate["ACCESS"];
        $_SESSION['sessionFullname'] = $rowValidate["FIRST_NAME"] . " " . $rowValidate["LAST_NAME"];

        echo "<script>alert('Logged in successfully')</script>";
        echo "<script>window.location.href='./index.php'</script>";
      } else {
        echo "<script>alert('Incorrect password')</script>";
      };
    }
  };
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>PHP CRUD - Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid w-25 mt-4 mx-auto text-center">
    <form action="login.php" method="POST">
      <fieldset>
        <input required type="email" id="EMAIL" name="EMAIL" placeholder="Enter your email" class="form-control mb-3">

        <input required type="password" id="PASSWORD" name="PASSWORD" placeholder="Enter your password" class="form-control mb-3">

        <button type="submit" id="LOGIN" name="LOGIN" class="btn bg-info w-100">Login</button>
      </fieldset>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
