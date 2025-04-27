<?php include 'views/layout/header.php'; ?>

<div class="card">
    <div class="card-header bg-primary text-white">
        <h1 class="h3 mb-0">Create Student</h1>
    </div>
    <div class="card-body">
        <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nim" class="form-label">NIM:</label>
                <input type="text" name="nim" id="nim" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone:</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>

            <div class="mb-3">
                <label for="join_date" class="form-label">Join Date:</label>
                <input type="date" name="join_date" id="join_date" class="form-control" required>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="index.php?action=students" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include 'views/layout/footer.php'; ?>