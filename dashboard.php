<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/styles.css"> <!-- Example CSS link -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .navbar {
            background-color: #333;
            color: #fff;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
        }
        .sidebar {
            width: 200px;
            background: #444;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            padding-top: 2rem;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 0.5rem 1rem;
        }
        .sidebar a:hover {
            background: #555;
        }
        .main-content {
            margin-left: 200px;
            padding: 2rem;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            padding: 1rem;
            background: #333;
            color: white;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">My Dashboard</div>
        <div class="user-menu">
            <a href="profile.php" style="color: #fff;">Profile</a> |
            <a href="login/logout.php" style="color: #fff;">Logout</a>
        </div>
    </div>
    <div class="sidebar">
        <a href="dashboard.php">Home</a>
        <a href="settings.php">Settings</a>
        <a href="reports.php">Reports</a>
        <a href="CRUD/index.php">Manajemen Tiket</a>

    </div>
    <div class="main-content">
        <h1>Welcome to the Dashboard</h1>
        <p>This is your dashboard where you can manage your application.</p>
        <p>Use the sidebar to navigate to other sections.</p>
    </div>
    <footer>
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>
</body>
</html>

