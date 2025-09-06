<?php
include 'db.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$res = $conn->query("SELECT * FROM students WHERE id = $id");
if (!$res || $res->num_rows === 0) { die("Record not found."); }
$row = $res->fetch_assoc();

function checked($a, $b){ return $a===$b ? 'checked' : ''; }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit Student Record</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <h2>Edit Student Record</h2>
  <div class="card">
    <form action="update.php" method="POST">
      <input type="hidden" name="id" value="<?php echo (int)$row['id']; ?>">

      <div class="row">
        <label>Student Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
      </div>

      <div class="row">
        <label>Mobile no.: +95 -</label>
        <input type="text" name="mobile" value="<?php echo htmlspecialchars($row['mobile']); ?>" required>
      </div>

      <div class="row">
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
      </div>

      <div class="row">
        <label>Gender:</label>
        <label><input type="radio" name="gender" value="Male" <?php echo checked($row['gender'],'Male'); ?>> Male</label>
        <label style="margin-left:16px;"><input type="radio" name="gender" value="Female" <?php echo checked($row['gender'],'Female'); ?>> Female</label>
      </div>

      <div class="row">
        <label>Department:</label>
        <label><input type="checkbox" name="department" value="English" <?php echo checked($row['department'],'English'); ?>> English</label>
        <label style="margin-left:16px;"><input type="checkbox" name="department" value="Computer" <?php echo checked($row['department'],'Computer'); ?>> Computer</label>
        <label style="margin-left:16px;"><input type="checkbox" name="department" value="Business" <?php echo checked($row['department'],'Business'); ?>> Business</label>
      </div>

      <div class="row">
        <label>Address:</label>
        <textarea name="address"><?php echo htmlspecialchars($row['address']); ?></textarea>
      </div>

      <button type="submit">Update Record</button>
    </form>
    <p style="margin-top:14px;"><a href="view.php">Cancel and Go Back to List</a></p>
  </div>
</div>
</body>
</html>
