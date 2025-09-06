<?php
include 'db.php';

$id         = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$name       = isset($_POST['name']) ? trim($_POST['name']) : '';
$mobile     = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
$email      = isset($_POST['email']) ? trim($_POST['email']) : '';
$gender     = isset($_POST['gender']) ? $_POST['gender'] : '';
$department = isset($_POST['department']) ? $_POST['department'] : '';
$address    = isset($_POST['address']) ? trim($_POST['address']) : '';

$sql = "UPDATE students SET
          name='".$conn->real_escape_string($name)."',
          mobile='".$conn->real_escape_string($mobile)."',
          email='".$conn->real_escape_string($email)."',
          gender='".$conn->real_escape_string($gender)."',
          department='".$conn->real_escape_string($department)."',
          address='".$conn->real_escape_string($address)."'
        WHERE id=$id";

echo '<div class="container"><div class="card">';
if ($conn->query($sql) === TRUE) {
  echo "<h2>Record updated successfully</h2>";
  echo "<p><a href='view.php'>View All Registered Students</a></p>";
} else {
  echo "Error updating record: " . htmlspecialchars($conn->error);
}
echo '</div></div>';

$conn->close();
