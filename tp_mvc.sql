-- database_setup.sql
-- Run this script to set up your database

-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS tp_mvc;
USE tp_mvc;

-- Create the students table
CREATE TABLE IF NOT EXISTS students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    nim VARCHAR(20) NOT NULL UNIQUE,
    phone VARCHAR(20),
    join_date DATE NOT NULL
);

-- Create the courses table
CREATE TABLE IF NOT EXISTS courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100) NOT NULL,
    instructor VARCHAR(100) NOT NULL
);

-- Create the enrollments table to track student enrollment in courses
CREATE TABLE IF NOT EXISTS enrollments (
    enrollment_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    enrollment_date DATE NOT NULL,
    FOREIGN KEY (student_id) REFERENCES students(student_id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(course_id) ON DELETE CASCADE,
    -- Ensure a student can't enroll in the same course twice
    UNIQUE (student_id, course_id)
);

-- Insert sample data
INSERT INTO students (name, nim, phone, join_date) VALUES
('John Doe', '2021001', '123-456-7890', '2021-09-01'),
('Jane Smith', '2021002', '234-567-8901', '2021-09-01'),
('Bob Johnson', '2021003', '345-678-9012', '2021-09-02');

INSERT INTO courses (course_name, instructor) VALUES
('Introduction to Programming', 'Dr. Alan Turing'),
('Database Systems', 'Dr. Edgar Codd'),
('Web Development', 'Dr. Tim Berners-Lee');

INSERT INTO enrollments (student_id, course_id, enrollment_date) VALUES
(1, 1, '2021-09-05'),
(1, 2, '2021-09-05'),
(2, 1, '2021-09-06'),
(2, 3, '2021-09-06'),
(3, 2, '2021-09-07');