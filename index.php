<?php
session_start();

if (!isset($_SESSION['contacts'])) {
    $_SESSION['contacts'] = [];
}

if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    array_splice($_SESSION['contacts'], $index, 1);
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<div class="container vh-100">
    <div class="row vh-100 align-items-center row justify-content-center">
        <div class="col col-6">

    <div class="card">
    <div class="card-body">
    <h1 class="card-title">Contacts</h1>
    <p class="card-text small text-secondary">
        This application is built using native PHP for basic CRUD functionality
    </p>
    <div class="col-12 d-grid">
    <a href="create.php" class="btn btn-primary mb-3">New Contact</a>

<?php if (!empty($_SESSION['contacts'])): ?>
    <div class="list-group">
        <?php foreach ($_SESSION['contacts'] as $index => $contact): ?>
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong><?= htmlspecialchars($contact['first_name']) . " " . htmlspecialchars($contact['last_name']) ?></strong><br>
                    <?= htmlspecialchars($contact['email']) ?>  <?= htmlspecialchars($contact['contact_number']) ?>
                </div>
                <div class="col-6 d-grid"> <gap 6>
                    <a href="update.php?index=<?= $index ?>" class="btn btn-warning btn-sm">✏ Update</a>
                    <a href="index.php?delete=<?= $index ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">🗑 Delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p class="text-muted">No contacts available.</p>
<?php endif; ?>

</body>
</html>
