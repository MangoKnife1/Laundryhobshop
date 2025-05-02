<?php
session_start();

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../repositories/login.php");
    exit;
}

// Display login success message
if (isset($_SESSION['login_success']) && $_SESSION['login_success'] === true) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'Login Successful',
                text: 'Welcome to LaundryHob Shop, " . $_SESSION['username'] . "!',
                confirmButtonColor: '#3085d6'
            });
        });
    </script>";
    unset($_SESSION['login_success']);
}
?>

<?php include('../includes/header.php'); ?>
<?php include('../includes/sidebar.php'); ?>


  <!--main-->
  <main class="main-container">
       <div class="dashboard-widgets">
         <div class="card">
           <div class="card-title">Today's Orders</div>
            <div class="card-value">15</div>
         </div>
          <div class="card">
            <div class="card-title">Total Pending</div>
           <div class="card-value">3</div>
          </div>
         <div class="card">
           <div class="card-title">Unpaid Orders</div>
           <div class="card-value">0</div>
         </div>
         <div class="card">
           <div class="card-title">Walk-In Orders</div>
           <div class="card-value">22</div>
          </div>
         <div class="card">
            <div class="card-title">Drop-Off Orders</div>
            <div class="card-value">44</div>
          </div>
         <div class="card">
            <div class="card-title">Total Customers</div>
            <div class="card-value">390</div>
         </div>
       </div>

                <!-- Create Order Button -->
        <div class="right">
          <a href="#createOrderModal" class="modal-button">CREATE ORDER</a>
        </div>


        <!-- Modal using target -->
        <div id="createOrderModal" class="modal">
          <div class="modal-content">
            <a href="#" class="close">&times;</a>
            <h2>Create Order</h2>

            <form>
              <div class="form-group">
              <label for="service">Service:</label>
              <select id="service" name="service" required>
                <option value="">Select service</option>
                <option value="walk-in">Walk-In</option>
                <option value="drop-off">Drop-Off</option>
              </select>
              </div>

              <div class="form-group">
              <label for="customer-name">Customer Name:</label>
              <input type="text" id="customer-name" name="customer-name" required />

              <label for="customer-phone">Phone Number:</label>
              <input type="tel" id="customer-phone" name="customer-phone" required />
              </div>

              <div class="form-group">
                <label for="wash-loads">Wash (loads):</label>
                <input type="number" id="wash-loads" name="wash-loads" min="0" />
              </div>

              <div class="form-group">
                <label for="dry-time">Dry (minutes):</label>
                <select id="dry-time" name="dry-time">
                  <option value="">Select time</option>
                  <option value="30">30 mins</option>
                  <option value="40">40 mins</option>
                  <option value="60">60 mins</option>
                </select>
              </div>

              <div class="form-group">
                <label>Detergent:</label>
                <input type="number" name="detergent-qty" placeholder="Qty" min="0" />
                <input type="number" name="detergent-price" placeholder="₱ Price" min="0" />
              </div>

              <div class="form-group">
                <label>Fabric Conditioner:</label>
                <input type="number" name="fabcon-qty" placeholder="Qty" min="0" />
                <input type="number" name="fabcon-price" placeholder="₱ Price" min="0" />
              </div>

              <div class="payment-buttons">
                <button type="submit">Pay Now</button>
                <button type="button">Pay Later</button>
              </div>
            </form>
          </div>
        </div>



          <!-- Walk-In Service Table -->
         <div class="table-section">
           <h2>Walk-In Service</h2>
             <div class="table-scroll">
            <table class="order-table">
            <thead>
               <tr>
               <th>Invoice</th>
               <th>Date and Time</th>
               <th>Locality</th>
               <th>Quantity</th>
               <th>Status</th>
               </tr>
            </thead>
     
     
            <tbody>
             <!-- 9 sample rows -->
             <tr><td>#WI001</td><td>2025-04-25 08:00 AM</td><td>Downtown</td><td>3</td><td>Completed</td></tr>
             <tr><td>#WI002</td><td>2025-04-25 08:15 AM</td><td>Uptown</td><td>2</td><td>In Progress</td></tr>
             <tr><td>#WI003</td><td>2025-04-25 08:30 AM</td><td>East Side</td><td>4</td><td>Pending</td></tr>
              <tr><td>#WI004</td><td>2025-04-25 08:45 AM</td><td>West End</td><td>1</td><td>Completed</td></tr>
              <tr><td>#WI005</td><td>2025-04-25 09:00 AM</td><td>Southville</td><td>5</td><td>In Progress</td></tr>
             <tr><td>#WI006</td><td>2025-04-25 09:15 AM</td><td>Northview</td><td>3</td><td>Completed</td></tr>
             <tr><td>#WI007</td><td>2025-04-25 09:30 AM</td><td>Hilltop</td><td>2</td><td>Pending</td></tr>
             <tr><td>#WI008</td><td>2025-04-25 09:45 AM</td><td>Greenfields</td><td>6</td><td>Completed</td></tr>
             <tr><td>#WI009</td><td>2025-04-25 10:00 AM</td><td>Downtown</td><td>3</td><td>In Progress</td></tr>
              <!-- more rows won't show unless scrolled -->
            </tbody>
         </table>
      </div>
     </div>


      <!-- Drop-Off Service Table -->
       <div class="table-section">
        <h2>Drop-Off Service</h2>
        <div class="table-scroll">
           <table class="order-table">
         <thead>
            <tr>
              <th>Invoice</th>
             <th>Date and Time</th>
             <th>Locality</th>
              <th>Quantity</th>
             <th>Status</th>
           </tr>
         </thead>
       <tbody>
          <!-- 9 sample rows -->
         <tr><td>#WI001</td><td>2025-04-25 08:00 AM</td><td>Downtown</td><td>3</td><td>Completed</td></tr>
         <tr><td>#WI002</td><td>2025-04-25 08:15 AM</td><td>Uptown</td><td>2</td><td>In Progress</td></tr>
          <tr><td>#WI003</td><td>2025-04-25 08:30 AM</td><td>East Side</td><td>4</td><td>Pending</td></tr>
          <tr><td>#WI004</td><td>2025-04-25 08:45 AM</td><td>West End</td><td>1</td><td>Completed</td></tr>
          <tr><td>#WI005</td><td>2025-04-25 09:00 AM</td><td>Southville</td><td>5</td><td>In Progress</td></tr>
          <tr><td>#WI006</td><td>2025-04-25 09:15 AM</td><td>Northview</td><td>3</td><td>Completed</td></tr>
          <tr><td>#WI007</td><td>2025-04-25 09:30 AM</td><td>Hilltop</td><td>2</td><td>Pending</td></tr>
         <tr><td>#WI008</td><td>2025-04-25 09:45 AM</td><td>Greenfields</td><td>6</td><td>Completed</td></tr>
         <tr><td>#WI009</td><td>2025-04-25 10:00 AM</td><td>Downtown</td><td>3</td><td>In Progress</td></tr>
          <!-- more rows won't show unless scrolled -->
        </tbody>
          </table>
       </div>
    </div>
  </main>

      <!--end main-->

      <script src="../js/script.js"></script>
<?php include('../includes/footer.php'); ?>