<?php
class Course {
    private $conn;
    private $table_name = "courses";

    // Course properties
    public $course_id;
    public $course_name;
    public $instructor;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new course
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (course_name, instructor) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        
        // Sanitize inputs
        $this->course_name = htmlspecialchars(strip_tags($this->course_name));
        $this->instructor = htmlspecialchars(strip_tags($this->instructor));
        
        // Bind parameters
        $stmt->bind_param("ss", $this->course_name, $this->instructor);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Read all courses
    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY course_id ASC";
        $result = $this->conn->query($query);
        return $result;
    }

    // Read one course
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE course_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->course_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $this->course_name = $row['course_name'];
            $this->instructor = $row['instructor'];
            return true;
        }
        return false;
    }

    // Update a course
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET course_name = ?, instructor = ? WHERE course_id = ?";
        $stmt = $this->conn->prepare($query);
        
        // Sanitize inputs
        $this->course_name = htmlspecialchars(strip_tags($this->course_name));
        $this->instructor = htmlspecialchars(strip_tags($this->instructor));
        $this->course_id = htmlspecialchars(strip_tags($this->course_id));
        
        // Bind parameters
        $stmt->bind_param("ssi", $this->course_name, $this->instructor, $this->course_id);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Delete a course
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE course_id = ?";
        $stmt = $this->conn->prepare($query);
        
        // Sanitize input
        $this->course_id = htmlspecialchars(strip_tags($this->course_id));
        
        // Bind parameter
        $stmt->bind_param("i", $this->course_id);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>