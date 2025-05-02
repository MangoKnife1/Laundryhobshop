<?php
session_start();
$errorMessage = '';

if (isset($_SESSION['login_error'])) {
    $errorMessage = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Login - LaundryHob Shop</title>
    <link rel="stylesheet" href="css/login.css"A/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <?php if (!empty($errorMessage)): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: 'error',
                    title: 'Login Failed',
                    text: <?= json_encode($errorMessage) ?>,
                    confirmButtonColor: '#3085d6'
                });
            });
        </script>
    <?php endif; ?>

    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <!-- Image background is set in CSS -->
                </div>
                <div class="col-md-6 right">
                    <div class="input-box">
                        <div class="text-center fw-bold fs-4 mb-2">LAUNDRYHOB SHOP</div>
                        <header>Login</header>
                        <form method="POST" action="repositories/login.php">
                            <div class="input-field">
                                <input type="text" class="input" name="username" id="username" required autocomplete="off" />
                                <label for="username">Username</label>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" name="password" id="password" required />
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" value="Login" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
