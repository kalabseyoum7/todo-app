<?php
include('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $is_done = isset($_POST['is_done']) ? 1 : 0;
    $stmt = $conn->prepare("UPDATE todos SET is_done = ? WHERE id = ?");
    $stmt->bind_param("ii", $is_done, $id);
    $stmt->execute();
}
header("Location: ../index.php");
exit;