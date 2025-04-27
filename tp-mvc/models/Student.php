<?php
class Student {
    private $conn;
    private $table_name = "students";

    // Student properties
    public $student_id;
    public $name;
    public $nim;
    public $phone;
    public $join_date;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Create a new student
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (name, nim, phone, join_date) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        
        // Sanitize inputs
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->nim = htmlspecialchars(strip_tags($this->nim));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->join_date = htmlspecialchars(strip_tags($this->join_date));
        
        // Bind parameters
        $stmt->bind_param("ssss", $this->name, $this->nim, $this->phone, $this->join_date);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Read all students
    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY student_id ASC";
        $result = $this->conn->query($query);
        return $result;
    }

    // Read one student
    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE student_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->student_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $this->name = $row['name'];
            $this->nim = $row['nim'];
            $this->phone = $row['phone'];
            $this->join_date = $row['join_date'];
            return true;
        }
        return false;
    }

    // Update a student
    public function update() {
        $query = "UPDATE " . $this->table_name . " SET name = ?, nim = ?, phone = ?, join_date = ? WHERE student_id = ?";
        $stmt = $this->conn->prepare($query);
        
        // Sanitize inputs
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->nim = htmlspecialchars(strip_tags($this->nim));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->join_date = htmlspecialchars(strip_tags($this->join_date));
        $this->student_id = htmlspecialchars(strip_tags($this->student_id));
        
        // Bind parameters
        $stmt->bind_param("ssssi", $this->name, $this->nim, $this->phone, $this->join_date, $this->student_id);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Delete a student
    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE student_id = ?";
        $stmt = $this->conn->prepare($query);
        
        // Sanitize input
        $this->student_id = htmlspecialchars(strip_tags($this->student_id));
        
        // Bind parameter
        $stmt->bind_param("i", $this->student_id);
        
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>