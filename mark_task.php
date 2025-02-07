<?php
session_start();

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {

    $id = $_POST['task'];
    $status = $_SESSION['tasks'][$id]['status'];

    if ($status == 'pending') {
        $_SESSION['tasks'][$id]['status'] = 'done';
    } else {
        $_SESSION['tasks'][$id]['status'] = 'pending';
    }

    header('Location: ../index.php');
    exit();
}
?>
