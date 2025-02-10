<?php
session_start();

if (!isset($_GET['index']) || !isset($_SESSION['contacts'][$_GET['index']])) {
    header("Location: index.php");
    exit();
}

$index = $_GET['index'];
$contact = $_SESSION['contacts'][$index];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['contacts'][$index] = [
        'first_name' => $_POST["first_name"],
        'last_name' => $_POST["last_name"],
        'email' => $_POST["email"],
        'contact_number' => $_POST["contact_number"]
    ];
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col col-5">

            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Update Contact</h1>
                    <p class="card-text small text-secondary">
                    
                    <form method="post">
    <div class="row g-2">
        
        <div class="col-md-6">
            <label class="form-label">First Name</label>
            <input type="text" name="first_name" value="<?= htmlspecialchars($contact['first_name']) ?>" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Last Name</label>
            <input type="text" name="last_name" value="<?= htmlspecialchars($contact['last_name']) ?>" class="form-control" required>
        </div>
    </div>

    <div class="row g-2 mt-2">
        
        <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($contact['email']) ?>" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Contact Number</label>
            <input type="text" name="contact_number" value="<?= htmlspecialchars($contact['contact_number']) ?>" class="form-control" required>
        </div>
    </div>

    <div class="row g-2 mt-3">
        <div class="col-12 d-grid">
            <button type="submit" class="btn btn-success btn-md">Save</button>
        </div>
        <div class="col-12 d-grid">
            <a href="index.php" class="btn btn-secondary btn-md">Cancel</a>
        </div>
    </div>
</form>

</body>
</html>
