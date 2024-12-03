<?php
session_start();
include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['userid'];
    $username = $conn->real_escape_string($_POST['username']);
    $appointment_date = $conn->real_escape_string($_POST['appointment_date']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "INSERT INTO appointments (user_id, username, appointment_date, description) 
            VALUES ('$user_id', '$username', '$appointment_date', '$description')";

    if ($conn->query($sql)) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom right, #6a11cb, #2575fc);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #ffffff;
            color: #333;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #6a11cb;
            text-align: center;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            outline: none;
            transition: border-color 0.3s;
        }

        input:focus, textarea:focus {
            border-color: #6a11cb;
            box-shadow: 0 0 5px rgba(106, 17, 203, 0.5);
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 1em;
            color: #fff;
            background: #6a11cb;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background: #2575fc;
        }

        .view-appointments {
            text-align: center;
            margin-top: 20px;
        }

        .view-appointments a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            background: #2575fc;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .view-appointments a:hover {
            background: #6a11cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Book Appointment</h1>
        <form method="POST" action="">
            <label for="username">Your Name</label>
            <input type="text" name="username" placeholder="Enter your name" required>
            <label for="appointment_date">Appointment Date</label>
            <input type="datetime-local" name="appointment_date" required>
            <label for="description">Description</label>
            <textarea name="description" rows="4" placeholder="Enter details here..." required></textarea>
            <button type="submit">Book Appointment</button>
        </form>
        <div class="view-appointments">
            <a href="view_appointments.php" class="btn">View Appointments</a>
        </div>
    </div>
</body>
</html>
