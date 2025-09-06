<?php

include 'db.php';

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header('Location: view.php?error=invalid_id');
    exit;
}

$id = (int) $_GET['id'];
$stmt = $conn->prepare('DELETE FROM students WHERE id = ?');
if (!$stmt) {
    header('Location: view.php?error=prepare_failed');
    exit;
}

$stmt->bind_param('i', $id);
$ok = $stmt->execute();
$stmt->close();
$conn->close();

if ($ok) {
    header('Location: view.php?msg=deleted');
    exit;
} else {
    header('Location: view.php?error=delete_failed');
    exit;
}
