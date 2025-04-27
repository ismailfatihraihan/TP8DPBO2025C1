<?php
require_once 'models/Course.php';

class CourseController {
    private $db;
    private $course;

    public function __construct($db) {
        $this->db = $db;
        $this->course = new Course($db);
    }

    public function index() {
        $result = $this->course->read();
        include 'views/courses/index.php';
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Set course property values
            $this->course->course_name = $_POST['course_name'];
            $this->course->instructor = $_POST['instructor'];
            
            // Create the course
            if ($this->course->create()) {
                header("Location: index.php?action=courses");
                exit();
            } else {
                $error = "Unable to create course.";
            }
        }
        include 'views/courses/create.php';
    }

    public function edit() {
        if (!isset($_GET['id'])) {
            header("Location: index.php?action=courses");
            exit();
        }
        
        $this->course->course_id = $_GET['id'];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Set course property values
            $this->course->course_name = $_POST['course_name'];
            $this->course->instructor = $_POST['instructor'];
            
            // Update the course
            if ($this->course->update()) {
                header("Location: index.php?action=courses");
                exit();
            } else {
                $error = "Unable to update course.";
            }
        }
        
        // Get course data
        $this->course->readOne();
        include 'views/courses/edit.php';
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $this->course->course_id = $_GET['id'];
            if ($this->course->delete()) {
                header("Location: index.php?action=courses");
                exit();
            } else {
                $error = "Unable to delete course.";
                include 'views/courses/index.php';
            }
        } else {
            header("Location: index.php?action=courses");
            exit();
        }
    }
}
?>