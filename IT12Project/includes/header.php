<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css"/>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
   
</head>
<body>  
    <div class="grid-container">
        <!-- Header -->
        <header class="header">
            <div class="menu-icon" onclick="toggleSidebar()">
                <span class="material-symbols-outlined">menu</span>
            </div>
            <div class="header-left">
                <div class="search-bar">
                    <span class="material-symbols-outlined">search</span>
                    <input type="text" placeholder="Search..." />
                </div>
            </div>
            <div class="header-right">
                <span class="material-symbols-outlined">notifications</span>
                <span class="material-symbols-outlined">account_circle</span>
                <span class="material-symbols-outlined logout-btn" onclick="logout()">logout</span>
            </div>
       <script>
           

            function logout() {
                window.location.href = '../repositories/logout.php';
            }
            </script>
        </header>