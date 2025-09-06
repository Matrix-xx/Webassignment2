<?php
include 'db.php';


$name       = isset($_POST['name']) ? trim($_POST['name']) : '';
$mobile     = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
$email      = isset($_POST['email']) ? trim($_POST['email']) : '';
$gender     = isset($_POST['gender']) ? $_POST['gender'] : '';
$department = isset($_POST['department']) ? $_POST['department'] : '';
$address    = isset($_POST['address']) ? trim($_POST['address']) : '';

$sql = "INSERT INTO students (name, mobile, email, gender, department, address)
        VALUES ('".$conn->real_escape_string($name)."',
                '".$conn->real_escape_string($mobile)."',
                '".$conn->real_escape_string($email)."',
                '".$conn->real_escape_string($gender)."',
                '".$conn->real_escape_string($department)."',
                '".$conn->real_escape_string($address)."')";

echo '<div class="container"><div class="card">';
if ($conn->query($sql) === TRUE) {
  echo "<h2>New record created successfully</h2>";
  echo "<p><a href='register.php'>Back to Registration</a></p>";
  echo "<p><a href='view.php'>View All Registration</a></p>";
} else {
  echo "Error: " . htmlspecialchars($conn->error);
}
echo '</div></div>';

$conn->close();
