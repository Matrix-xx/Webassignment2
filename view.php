<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registered Students</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Registered Students</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Mobile No.</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Department</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM students ORDER BY id ASC");
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo (int)$row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['mobile']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['gender']); ?></td>
                    <td><?php echo htmlspecialchars($row['department']); ?></td>
                    <td><?php echo htmlspecialchars($row['address']); ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                        <a href="delete.php?id=<?php echo $row['id']; ?>"
                           onclick="return confirm('Are you sure you want to delete this record?');">
                           Delete
                        </a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='8'>No students registered yet.</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="register.php">Register a New Student</a>
</div>
</body>
</html>
