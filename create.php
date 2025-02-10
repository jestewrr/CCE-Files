<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contact = [
        'first_name' => $_POST["first_name"],
        'last_name' => $_POST["last_name"],
        'email' => $_POST["email"],
        'contact_number' => $_POST["contact_number"]
    ];

    $_SESSION['contacts'][] = $contact;
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col col-5">

            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">Add Contact</h1>
                    <p class="card-text small text-secondary">
                        Add, complete, or remove tasks easily.
                    </p>

<form method="post">
    <div class="row g-2">
    <div class="col-mb-6">
    <form>
            <div class="row g-2">
                <div class="col-md-6">
                <label class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control" required>
            </div>
                <div class="col-md-6">
                <label class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control" required>
            </div>

            <div class="row g-2">
                <div class="col-md-6">
                <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
            </div>
            
            <div class="col-md-6">
                <label class="form-label">Contact Number</label>
                <input type="text" name="contact_number" class="form-control" required>
            </div>
            
    <button type="submit" class="btn btn-success">Save</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
</form>

</body>
</html>
