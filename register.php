<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Registration Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Student Registration Form</h2>
  <div class="card">
    <form action="insert.php" method="POST">
      <div class="row">
        <label>Student Name:</label>
        <input type="text" name="name" required>
      </div>

      <div class="row">
        <label>Mobile no.: +95 -</label>
        <input type="text" name="mobile" required>
      </div>

      <div class="row">
        <label>Email:</label>
        <input type="email" name="email" required>
      </div>

      <div class="row">
        <label>Gender:</label>
        <label><input type="radio" name="gender" value="Male" required checked> Male</label>
        <label style="margin-left:16px;"><input type="radio" name="gender" value="Female" required> Female</label>
      </div>

      <div class="row">
        <label>Department:</label>
        <label><input type="radio" name="department" value="English" require checked> English</label>
        <label style="margin-left:16px;"><input type="radio" name="department" value="Computer" require> Computer</label>
        <label style="margin-left:16px;"><input type="radio" name="department" value="Business" require> Business</label>
      </div>

      <div class="row">
        <label>Address:</label>
        <textarea name="address"></textarea>
      </div>

      <button type="submit">Register</button>
    </form>
    <p style="margin-top:14px;"><a href="view.php">View All Registered Students</a></p>
  </div>
</div>
</body>
</html>
