<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="stylees.ss">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #ffffff;
        }

        .container {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            text-align: center;
            background: #ffffff;
            color: #333;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #4CAF50;
            font-size: 2.5em;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            margin: 10px 10px;
            padding: 12px 20px;
            font-size: 16px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            background: #007BFF;
            transition: background 0.3s ease-in-out;
        }

        .btn:hover {
            background: #0056b3;
        }

        .btn:nth-child(2) {
            background: #28a745;
        }

        .btn:nth-child(2):hover {
            background: #218838;
        }

        .btn:nth-child(3) {
            background: #dc3545;
        }

        .btn:nth-child(3):hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>This is your dashboard. From here, you can book and manage appointments.</p>
        <a href="book_appointment.php" class="btn">Book Appointment</a>
        <a href="view_appointments.php" class="btn">View Appointments</a>
        <a href="logout.php" class="btn">Logout</a>
    </div>
</body>
</html>
