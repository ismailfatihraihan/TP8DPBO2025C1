<?php include 'views/layout/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Courses</h1>
    <a href="index.php?action=courses&method=create" class="btn btn-primary">Add New Course</a>
</div>

<?php if(isset($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Instructor</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['course_id']; ?></td>
                        <td><?php echo $row['course_name']; ?></td>
                        <td><?php echo $row['instructor']; ?></td>
                        <td>
                            <a href="index.php?action=courses&method=edit&id=<?php echo $row['course_id']; ?>" class="btn btn-sm btn-success">Edit</a>
                            <a href="index.php?action=courses&method=delete&id=<?php echo $row['course_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this course?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No courses found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include 'views/layout/footer.php'; ?>