<?php
session_start();
include('../includes/header.php');
include('../includes/sidebar.php');
?>

<main class="main-container">
    <div class="header-actions">
        <h1>Add New Staff</h1>
        <a href="staff.php" class="btn-back">
            <span class="material-symbols-outlined">arrow_back</span> Back to Staff
        </a>
    </div>

    <div class="staff-form">
        <form action="save_staff.php" method="POST">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="fullname" required>
            </div>
            
            <div class="form-group">
                <label>Position</label>
                <select name="position" required>
                    <option value="Manager">Manager</option>
                    <option value="Supervisor">Supervisor</option>
                    <option value="Staff">Staff</option>
                </select>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <button type="submit" class="btn-submit">Add Staff Member</button>
        </form>
    </div>
</main>

<?php include('../includes/footer.php'); ?>