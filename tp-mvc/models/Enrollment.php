<?php
class Enrollment {
    private $conn;
    private $table_name = "enrollments";

    // Enrollment properties
    public $enrollment_id;
    public $student_id;
    public $course_id;
    public $enrollment_date;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new enrollment
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (student_id, course_id, enrollment_date) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        
        // Sanitize inputs
        $this->student_id = htmlspecialchars(strip_tags($this->student_id));
        $this->course_id = htmlspecialchars(strip_tags($this->course_id));
        $this->enrollment_date = htmlspecialchars(strip_tags($this->enrollment_date));
        
        // Bind parameters
        $stmt->bind_param("iis", $this->student_id, $this->course_id, $this->enrollment_date);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Read all enrollments with student and course details
    public function read() {
        $query = "SELECT e.enrollment_id, e.enrollment_date, 
                  s.student_id, s.name as student_name, s.nim, 
                  c.course_id, c.course_name, c.instructor 
                  FROM " . $this->table_name . " e
                  LEFT JOIN students s ON e.student_id = s.student_id
                  LEFT JOIN courses c ON e.course_id = c.course_id
                  ORDER BY e.enrollment_id ASC";
        $result = $this->conn->query($query);
        return $result;
    }

    // Read enrollments for a specific student
    public function readByStudent() {
        $query = "SELECT e.enrollment_id, e.enrollment_date, 
                  c.course_id, c.course_name, c.instructor 
                  FROM " . $this->table_name . " e
                  LEFT JOIN courses c ON e.course_id = c.course_id
                  WHERE e.student_id = ?
                  ORDER BY e.enrollment_id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->student_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Read enrollments for a specific course
    public function readByCourse() {
        $query = "SELECT e.enrollment_id, e.enrollment_date, 
                  s.student_id, s.name as student_name, s.nim 
                  FROM " . $this->table_name . " e
                  LEFT JOIN students s ON e.student_id = s.student_id
                  WHERE e.course_id = ?
                  ORDER BY e.enrollment_id ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->course_id);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Read one enrollment
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE enrollment_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->enrollment_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $this->student_id = $row['student_id'];
            $this->course_id = $row['course_id'];
            $this->enrollment_date = $row['enrollment_date'];
            return true;
        }
        return false;
    }

    // Update an enrollment
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET student_id = ?, course_id = ?, enrollment_date = ? WHERE enrollment_id = ?";
        $stmt = $this->conn->prepare($query);
        
        // Sanitize inputs
        $this->student_id = htmlspecialchars(strip_tags($this->student_id));
        $this->course_id = htmlspecialchars(strip_tags($this->course_id));
        $this->enrollment_date = htmlspecialchars(strip_tags($this->enrollment_date));
        $this->enrollment_id = htmlspecialchars(strip_tags($this->enrollment_id));
        
        // Bind parameters
        $stmt->bind_param("iisi", $this->student_id, $this->course_id, $this->enrollment_date, $this->enrollment_id);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Delete an enrollment
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE enrollment_id = ?";
        $stmt = $this->conn->prepare($query);
        
        // Sanitize input
        $this->enrollment_id = htmlspecialchars(strip_tags($this->enrollment_id));
        
        // Bind parameter
        $stmt->bind_param("i", $this->enrollment_id);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>