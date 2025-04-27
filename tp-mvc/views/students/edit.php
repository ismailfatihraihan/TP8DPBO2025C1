<?php include 'views/layout/header.php'; ?>

<div class="card">
    <div class="card-header bg-warning text-white">
        <h1 class="h3 mb-0">Edit Student</h1>
    </div>
    <div class="card-body">
        <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="post">
            <input type="hidden" name="student_id" value="<?php echo $this->student->student_id; ?>">
            
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="<?php echo $this->student->name; ?>" required>
            </div>

            <div class="mb-3">
                <label for="nim" class="form-label">NIM:</label>
                <input type="text" name="nim" id="nim" class="form-control" value="<?php echo $this->student->nim; ?>" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $this->student->phone; ?>">
            </div>

            <div class="mb-3">
                <label for="join_date" class="form-label">Join Date:</label>
                <input type="date" name="join_date" id="join_date" class="form-control" value="<?php echo $this->student->join_date; ?>" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="index.php?action=students" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>