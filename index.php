<?php
session_start();

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TODO Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col col-5">

            <div class="card">
                <div class="card-body">
                    <h1 class="card-title">To-Do Application</h1>
                    <p class="card-text small text-secondary">
                        Add, complete, or remove tasks easily.
                    </p>

                    <!-- Add Task Form (Moved Outside the foreach Loop) -->
                    <form action="operations/new_task.php" method="POST" class="input-group mb-3">
                        <input required type="text" class="form-control" placeholder="Add new task here..."
                               aria-label="Add new task here" aria-describedby="button-addon2" name="task">
                        <button class="btn btn-success" type="submit" id="button-addon2">Add</button>
                    </form>

                    <!-- List Tasks -->
                    <div class="d-flex flex-column gap-2">
                        <?php foreach ($_SESSION['tasks'] as $index => $task) { ?>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center gap-2">
                                    <form action="operations/mark_task.php" method="POST">
                                        <input value="<?php echo $index; ?>" hidden name="task">
                                        <input type="checkbox"
                                               class="form-check-input"
                                               onchange="this.form.submit()">
                                        <label class="form-check-label"><?php echo $task['name']; ?></label>
                                        <small class="badge rounded-pill 
                                            <?php echo ($task['status'] == 'pending') ? 'text-bg-warning' : 'text-bg-success'; ?>">
                                            <?php echo ucfirst($task['status']); ?>
                                        </small>
                                    </form>
                                </div>

                                <!-- Delete Task -->
                                <form action="operations/delete_task.php" method="POST">
                                    <input value="<?php echo $index; ?>" hidden name="id">
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        <?php } ?>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>