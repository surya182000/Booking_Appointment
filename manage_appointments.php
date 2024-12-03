<?php
session_start();
include 'config.php';

if (!isset($_SESSION['adminid'])) {
    header('Location: admin_login.php');
    exit;
}

$sql = "SELECT appointments.id, users.username, appointments.appointment_date, appointments.description, appointments.status 
        FROM appointments
        JOIN users ON appointments.user_id = users.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Appointments</title>
    <style>
        /* General Reset and Styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #56ccf2, #2f80ed);
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        h1 {
            text-align: center;
            color: #2f80ed;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #2f80ed;
            color: #fff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f8ff;
        }

        td a {
            text-decoration: none;
            padding: 8px 12px;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        td a:hover {
            background-color: #0056b3;
        }

        td a.delete {
            background-color: #dc3545;
        }

        td a.delete:hover {
            background-color: #c82333;
        }

        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manage Appointments</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Appointment Date</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0) { ?>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['username']); ?></td>
                            <td><?php echo $row['appointment_date']; ?></td>
                            <td><?php echo htmlspecialchars($row['description']); ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <a href="update_appointment.php?id=<?php echo $row['id']; ?>">Update</a>
                                <a href="delete_appointment.php?id=<?php echo $row['id']; ?>" 
                                   class="delete" 
                                   onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="6">No appointments found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
