<?php include 'views/layout/header.php'; ?>

<div class="card">
    <div class="card-header bg-warning text-white">
        <h1 class="h3 mb-0">Edit Course</h1>
    </div>
    <div class="card-body">
        <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="post">
            <input type="hidden" name="course_id" value="<?php echo $this->course->course_id; ?>">
            
            <div class="mb-3">
                <label for="course_name" class="form-label">Course Name:</label>
                <input type="text" name="course_name" id="course_name" class="form-control" value="<?php echo $this->course->course_name; ?>" required>
            </div>

            <div class="mb-3">
                <label for="instructor" class="form-label">Instructor:</label>
                <input type="text" name="instructor" id="instructor" class="form-control" value="<?php echo $this->course->instructor; ?>" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="index.php?action=courses" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>