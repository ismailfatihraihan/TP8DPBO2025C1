<?php
require_once 'models/Student.php';

class StudentController {
    private $db;
    private $student;

    public function __construct($db) {
        $this->db = $db;
        $this->student = new Student($db);
    }

    public function index() {
        $result = $this->student->read();
        include 'views/students/index.php';
    }

    public function create() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Set student property values
            $this->student->name = $_POST['name'];
            $this->student->nim = $_POST['nim'];
            $this->student->phone = $_POST['phone'];
            $this->student->join_date = $_POST['join_date'];
            
            // Create the student
            if ($this->student->create()) {
                header("Location: index.php?action=students");
                exit();
            } else {
                $error = "Unable to create student.";
            }
        }
        include 'views/students/create.php';
    }

    public function edit() {
        if (!isset($_GET['id'])) {
            header("Location: index.php?action=students");
            exit();
        }
        
        $this->student->student_id = $_GET['id'];
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Set student property values
            $this->student->name = $_POST['name'];
            $this->student->nim = $_POST['nim'];
            $this->student->phone = $_POST['phone'];
            $this->student->join_date = $_POST['join_date'];
            
            // Update the student
            if ($this->student->update()) {
                header("Location: index.php?action=students");
                exit();
            } else {
                $error = "Unable to update student.";
            }
        }
        
        // Get student data
        $this->student->readOne();
        include 'views/students/edit.php';
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $this->student->student_id = $_GET['id'];
            if ($this->student->delete()) {
                header("Location: index.php?action=students");
                exit();
            } else {
                $error = "Unable to delete student.";
                include 'views/students/index.php';
            }
        } else {
            header("Location: index.php?action=students");
            exit();
        }
    }
}
?>