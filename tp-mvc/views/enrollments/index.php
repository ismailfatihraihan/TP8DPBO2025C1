<?php include 'views/layout/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Enrollments</h1>
    <a href="index.php?action=enrollments&method=create" class="btn btn-primary">Add New Enrollment</a>
</div>

<?php if(isset($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student</th>
                <th>Course</th>
                <th>Enrollment Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['enrollment_id']; ?></td>
                        <td><?php echo $row['student_name'] . ' (' . $row['nim'] . ')'; ?></td>
                        <td><?php echo $row['course_name'] . ' - ' . $row['instructor']; ?></td>
                        <td><?php echo $row['enrollment_date']; ?></td>
                        <td>
                            <a href="index.php?action=enrollments&method=edit&id=<?php echo $row['enrollment_id']; ?>" class="btn btn-sm btn-success">Edit</a>
                            <a href="index.php?action=enrollments&method=delete&id=<?php echo $row['enrollment_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this enrollment?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No enrollments found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include 'views/layout/footer.php'; ?>