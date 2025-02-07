<?php
session_start();

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {

    $task = $_POST['task'];
    array_push($_SESSION['tasks'], ['name' => $task, 'status' => 'pending']);

    header('Location: ../index.php');
    exit();
}
?>
