<?php include 'views/layout/header.php'; ?>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h1 class="h3 mb-0">Create Enrollment</h1>
    </div>
    <div class="card-body">
        <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="student_id" class="form-label">Student:</label>
                <select name="student_id" id="student_id" class="form-select" required>
                    <option value="">Select Student</option>
                    <?php while($student = $students->fetch_assoc()): ?>
                        <option value="<?php echo $student['student_id']; ?>">
                            <?php echo $student['name'] . ' (' . $student['nim'] . ')'; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="course_id" class="form-label">Course:</label>
                <select name="course_id" id="course_id" class="form-select" required>
                    <option value="">Select Course</option>
                    <?php while($course = $courses->fetch_assoc()): ?>
                        <option value="<?php echo $course['course_id']; ?>">
                            <?php echo $course['course_name'] . ' - ' . $course['instructor']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="enrollment_date" class="form-label">Enrollment Date:</label>
                <input type="date" name="enrollment_date" id="enrollment_date" class="form-control" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="index.php?action=enrollments" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>