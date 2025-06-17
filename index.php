<?php include('config/db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo List App</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <h1>My Todo List</h1>

    <form action="actions/add.php" method="POST">
        <input type="text" name="task" placeholder="Enter a new task" required>
        <button type="submit">Add Task</button>
    </form>

    <ul>
        <?php
        $result = $conn->query("SELECT * FROM todos ORDER BY created_at DESC");
        while ($row = $result->fetch_assoc()):
        ?>
        <li>
            <form action="actions/update.php" method="POST" class="inline-form">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="checkbox" name="is_done" onchange="this.form.submit()" <?= $row['is_done'] ? 'checked' : '' ?>>
                <span class="<?= $row['is_done'] ? 'done' : '' ?>"><?= htmlspecialchars($row['task']) ?></span>
            </form>
            <a href="actions/delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Delete this task?')">Delete</a>
        </li>
        <?php endwhile; ?>
    </ul>
</div>
</body>
</html>