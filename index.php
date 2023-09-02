
<?php
  require("./session.php");
  require("./retrieve.php");

  // PHP Class
  class Employee {
    public $salary;
    public $job_position;  // Public properties are prefixed with the keyword "public"
    function setSalary($new_salary) {
      $this -> salary = $new_salary;    // Referring to the current Class' properties using $this
    }
    function getSalary() {
      echo $this -> salary;
    }
    function setJobPosition($new_job_position) {
      $this -> job_position = $new_job_position;    // Referring to the current Class' properties using $this
    }
    function getJobPosition() {
      echo $this -> job_position;
    }
  }

  // Instantiating a Class
  $manager = new Employee();
  $manager -> salary = 250000;
  $manager -> job_position = "Manager";  //  Setting the values of the properties of the Instance

  $developerFullStack = new Employee();
  
  $developerFullStack -> setJobPosition("Full Stack Developer");

  $developerFullStack -> setSalary(250000);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>PHP CRUD</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
  <?php
    echo "<h3>Welcome " . $_SESSION['sessionFullname'] . "</h3>";
    echo "<p>(" . $_SESSION['sessionAccess'] . ")</p>";
  ?>

  <form action="./logout.php" method="POST">
    <input type="submit" value="Logout" class="btn btn-danger">
  </form>

  <h3>Create User</h3>

  <form action="./create.php" method="post">
    <input id="firstname" name="firstname" type="text" placeholder="Enter First Name" required>

    <input id="lastname" name="lastname" type="text" placeholder="Enter Last Name" required>

    <input id="email" name="email" type="email" placeholder="Enter Email Address" required>

    <input id="password" name="password" type="password" placeholder="Enter Password" required>

    <select id="gender" name="gender">
      <option value="" readonly >Select Gender</option>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
      </select>

    <select id="access" name="access">
      <option value="" readonly>Select Access Type</option>
      <option value="User">User</option>
      <option value="Admin">Admin</option>
    </select>

    <input id="create" name="create" type="submit" value="Create" class="btn btn-primary">
  </form>

  <?php  if (mysqli_num_rows($result) > 0) {  ?>
  <table class="table table-striped border mt-4">
    <thead class="table-secondary">
      <tr class="text-center border">
        <th><a class="btn btn-success" href="?column=FIRST_NAME&sortorder=<?php echo $sort ?>">First Name</a></th>
        <th><a class="btn btn-success" href="?column=LAST_NAME&sortorder=<?php echo $sort ?>">Last Name</a></th>
        <th><a class="btn btn-success" href="?column=EMAIL&sortorder=<?php echo $sort ?>">Email</a></th>
        <th><a class="btn btn-success" href="?column=GENDER&sortorder=<?php echo $sort ?>">Gender</a></th>
        <th><a class="btn btn-success" href="?column=ACCESS&sortorder=<?php echo $sort ?>">Access Type</a></th>

        <th><a class="btn btn-success">Job Position</a></th>

        <?php if ($_SESSION['sessionAccess'] == "Admin") { ?>
          <th colspan="2"><a class="btn btn-success">Actions</a></th>
        <?php }; ?>
      </tr>
    </thead>
    <tbody>
      <?php
        while ($row = mysqli_fetch_array($result)) {
          
      ?>
      <tr class="text-center">
        <td><?php echo $row["FIRST_NAME"] ?></td>
        <td><?php echo $row["LAST_NAME"] ?></td>
        <td><?php echo $row["EMAIL"] ?></td>
        <td><?php echo $row["GENDER"] ?></td>
        <td><?php echo $row["ACCESS"] ?></td>
        
        <td><?php echo $developerFullStack -> getJobPosition(); ?></td>

        <?php if ($_SESSION['sessionAccess'] == "Admin") { ?>
          <td>
            <form action="./edit.php" method="get">
              <input 
                id="edit"
                name="edit"
                type="submit"
                value="Edit"
                class="btn bg-warning">

              <input id="account_id" name="account_id" type="hidden" value="<?php echo $row['ID']; ?>">
            </form>
          </td>

          <td>
            <form action="./delete.php" method="post">
              <input 
                id="delete"
                name="delete"
                type="submit"
                value="Delete"
                class="btn btn-danger"
                onclick="return confirm('Are you sure you want to delete this record?')">

              <input id="account_id" name="account_id" type="hidden" value="<?php echo $row['ID']; ?>">
            </form>
          </td>
        <?php }; ?>
      </tr>
      <?php
        };
      ?>
    </tbody>
  </table>
  <?php
    } else {
      echo "<div class='alert alert-warning'>No records found</div>";
    };
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
