<?php
// Include database connection
require_once 'config/Database.php';

// Include controllers
require_once 'controllers/StudentController.php';
require_once 'controllers/CourseController.php';
require_once 'controllers/EnrollmentController.php';

// Create database connection
$database = new Database();
$db = $database->getConnection();

// Get action from URL parameter
$action = isset($_GET['action']) ? $_GET['action'] : 'students';
$method = isset($_GET['method']) ? $_GET['method'] : 'index';

// Route to the appropriate controller and method
switch ($action) {
    case 'students':
        $controller = new StudentController($db);
        break;
    case 'courses':
        $controller = new CourseController($db);
        break;
    case 'enrollments':
        $controller = new EnrollmentController($db);
        break;
    default:
        $controller = new StudentController($db);
        break;
}

// Call the appropriate method
switch ($method) {
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        $controller->index();
        break;
}
?>