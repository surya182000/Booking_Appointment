<?php
session_start();
include 'config.php';

if (!isset($_SESSION['userid'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['userid'];
$sql = "SELECT * FROM appointments WHERE user_id = '$user_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Appointments</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #4CAF50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th, table td {
            text-align: center;
            padding: 12px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px auto;
            text-align: center;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>My Appointments</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Appointment Date</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo date("d-M-Y H:i", strtotime($row['appointment_date'])); ?></td>
                    <td><?php echo $row['Description']; ?></td>
                    <td>
                        <?php 
                        if ($row['status'] == 'Pending') echo '<span style="color: orange; font-weight: bold;">Pending</span>';
                        elseif ($row['status'] == 'Confirmed') echo '<span style="color: green; font-weight: bold;">Confirmed</span>';
                        elseif ($row['status'] == 'Cancelled') echo '<span style="color: red; font-weight: bold;">Cancelled</span>';
                        ?>
                    </td>
                </tr>
            <?php } ?>
        </table>
        <a href="book_appointment.php" class="btn">Book Another Appointment</a>
    </div>
</body>
</html>
