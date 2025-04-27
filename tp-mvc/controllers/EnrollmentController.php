<?php
require_once 'models/Enrollment.php';
require_once 'models/Student.php';
require_once 'models/Course.php';

class EnrollmentController {
    private $db;
    private $enrollment;
    private $student;
    private $course;

    public function __construct($db) {
        $this->db = $db;
        $this->enrollment = new Enrollment($db);
        $this->student = new Student($db);
        $this->course = new Course($db);
    }

    public function index() {
        $result = $this->enrollment->read();
        include 'views/enrollments/index.php';
    }

    public function create() {
        // Get all students and courses for the dropdown
        $students = $this->student->read();
        $courses = $this->course->read();
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Set enrollment property values
            $this->enrollment->student_id = $_POST['student_id'];
            $this->enrollment->course_id = $_POST['course_id'];
            $this->enrollment->enrollment_date = $_POST['enrollment_date'];
            
            // Create the enrollment
            if ($this->enrollment->create()) {
                header("Location: index.php?action=enrollments");
                exit();
            } else {
                $error = "Unable to create enrollment. The student may already be enrolled in this course.";
            }
        }
        include 'views/enrollments/create.php';
    }

    public function edit() {
        if (!isset($_GET['id'])) {
            header("Location: index.php?action=enrollments");
            exit();
        }
        
        $this->enrollment->enrollment_id = $_GET['id'];
        
        // Get all students and courses for the dropdown
        $students = $this->student->read();
        $courses = $this->course->read();
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Set enrollment property values
            $this->enrollment->student_id = $_POST['student_id'];
            $this->enrollment->course_id = $_POST['course_id'];
            $this->enrollment->enrollment_date = $_POST['enrollment_date'];
            
            // Update the enrollment
            if ($this->enrollment->update()) {
                header("Location: index.php?action=enrollments");
                exit();
            } else {
                $error = "Unable to update enrollment. The student may already be enrolled in this course.";
            }
        }
        
        // Get enrollment data
        $this->enrollment->readOne();
        include 'views/enrollments/edit.php';
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $this->enrollment->enrollment_id = $_GET['id'];
            if ($this->enrollment->delete()) {
                header("Location: index.php?action=enrollments");
                exit();
            } else {
                $error = "Unable to delete enrollment.";
                include 'views/enrollments/index.php';
            }
        } else {
            header("Location: index.php?action=enrollments");
            exit();
        }
    }
}
?>