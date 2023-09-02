<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>PHP CRUD - Edit</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
  <h3>Edit User</h3>

  <form action="self" method="post">
    <input id="firstname" name="firstname" type="text" required>

    <input id="lastname" name="lastname" type="text" required>

    <input id="email" name="email" type="email" required>

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

    <input id="edit" name="edit" type="submit" value="Edit" class="btn btn-primary">
  </form>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
