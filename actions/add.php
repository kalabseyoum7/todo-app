<?php
include('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $task = trim($_POST['task']);
    if (!empty($task)) {
        $stmt = $conn->prepare("INSERT INTO todos (task) VALUES (?)");
        $stmt->bind_param("s", $task);
        $stmt->execute();
    }
}
header("Location: ../index.php");
exit;