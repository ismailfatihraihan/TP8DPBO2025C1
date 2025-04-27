<?php include 'views/layout/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Students</h1>
    <a href="index.php?action=students&method=create" class="btn btn-primary">Add New Student</a>
</div>

<?php if(isset($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>NIM</th>
                <th>Phone</th>
                <th>Join Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['student_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['nim']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['join_date']; ?></td>
                        <td>
                            <a href="index.php?action=students&method=edit&id=<?php echo $row['student_id']; ?>" class="btn btn-sm btn-success">Edit</a>
                            <a href="index.php?action=students&method=delete&id=<?php echo $row['student_id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">No students found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include 'views/layout/footer.php'; ?>