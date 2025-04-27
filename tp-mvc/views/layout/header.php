<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Student Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php echo (!isset($_GET['action']) || $_GET['action'] == 'students') ? 'active' : ''; ?>" href="index.php?action=students">Students</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['action']) && $_GET['action'] == 'courses') ? 'active' : ''; ?>" href="index.php?action=courses">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (isset($_GET['action']) && $_GET['action'] == 'enrollments') ? 'active' : ''; ?>" href="index.php?action=enrollments">Enrollments</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-4">