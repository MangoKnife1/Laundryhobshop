<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

// Include common components
include('../includes/header.php');
include('../includes/sidebar.php');
?>

<main class="main-container">
    <div class="right">
        <a href="#addStaffModal" class="modal-button">+ ADD STAFF</a>
    </div>

    <!-- Add Staff Modal -->
    <div id="addStaffModal" class="modal">
        <div class="modal-content">
            <a href="#" class="close">&times;</a>
            <h2>Add New Staff Member</h2>
            <form action="../repositories/add_staff_repositories.php" method="POST">
                <div class="form-group">
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{11}" required>
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>
                </div>

                <div class="form-group">
                    <label for="hire_date">Hire Date:</label>
                    <input type="date" id="hire_date" name="hire_date" required>
                </div>

                <div class="form-group">
                    <label for="job_title">Job Title:</label>
                    <select id="job_title" name="job_title" required>
                        <option value="">Select Job Title</option>
                        <option value="Laundry Attendant">Laundry Attendant</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Manager">Manager</option>
                        <option value="Driver">Driver</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Employment Status:</label>
                    <select id="status" name="status" required>
                        <option value="active">Active</option>
                        <option value="on_leave">On Leave</option>
                        <option value="terminated">Terminated</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="address">Address:</label>
                    <textarea id="address" name="address" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="submit-button">Add Staff Member</button>
                </div>
            </form>
        </div>
    </div>

     <!-- Staff Table -->
<div class="table-section">
    <h2>Staff</h2>
    <div class="table-scroll">
        <table class="order-table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Job Title</th>
                    <th>Status</th>
                    <th>Hire Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once('../repositories/connection.php');
                
                try {
                    $query = "SELECT first_name, last_name, email, phone_number, 
                             job_title, status, hire_date FROM staff ORDER BY hire_date DESC";
                    $result = mysqli_query($conn, $query);

                    if (!$result) {
                        throw new Exception("Database error: " . mysqli_error($conn));
                    }

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . htmlspecialchars($row['first_name']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['last_name']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['phone_number']) . '</td>';
                            echo '<td>' . htmlspecialchars($row['job_title']) . '</td>';
                            echo '<td><span class="status-badge ' . htmlspecialchars($row['status']) . '">' 
                                 . ucwords(str_replace('_', ' ', $row['status'])) . '</span></td>';
                            echo '<td>' . date('M d, Y', strtotime($row['hire_date'])) . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="7">No staff members found</td></tr>';
                    }
                } catch (Exception $e) {
                    echo '<tr><td colspan="7">Error: ' . $e->getMessage() . '</td></tr>';
                } finally {
                    mysqli_close($conn);
                }
                ?>
            </tbody>
        </table>
    </div>
</div>


</main>

<?php include('../includes/footer.php'); ?>