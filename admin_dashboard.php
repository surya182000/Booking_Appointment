<?php
session_start();
if (!isset($_SESSION['adminid'])) {
    header('Location: admin_login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="stylees.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #ff6a00, #ee0979);
            color: #ffffff;
        }

        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            text-align: center;
            background-color: #ffffff;
            color: #333;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #ee0979;
            font-size: 2.5em;
        }

        nav {
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            margin: 10px;
            padding: 15px 20px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .btn:nth-child(1) {
            background-color: #28a745; /* Green */
        }

        .btn:nth-child(1):hover {
            background-color: #218838;
        }

        .btn:nth-child(2) {
            background-color: #ffc107; /* Yellow */
            color: #333;
        }

        .btn:nth-child(2):hover {
            background-color: #e0a800;
        }

        .btn:nth-child(3) {
            background-color: #dc3545; /* Red */
        }

        .btn:nth-child(3):hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, Admin!</h1>
        <nav>
            <a href="manage_users.php" class="btn">Manage Users</a>
            <a href="manage_appointments.php" class="btn">Manage Appointments</a>
            <a href="logout.php" class="btn">Logout</a>
        </nav>
    </div>
</body>
</html>

