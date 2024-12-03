<?php
include 'config.php';

if (!isset($_GET['id'])) {
    header('Location: admin_manage_appointments.php');
    exit;
}

$id = $conn->real_escape_string($_GET['id']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $conn->real_escape_string($_POST['status']);

    $sql = "UPDATE appointments SET status = '$status' WHERE id = '$id'";

    if ($conn->query($sql)) {
        header('Location: admin_manage_appointments.php');
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

$sql = "SELECT * FROM appointments WHERE id = '$id'";
$result = $conn->query($sql);
$appointment = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Appointment</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #ff9966, #ff5e62);
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h1 {
            color: #ff5e62;
            font-size: 2em;
            margin-bottom: 20px;
        }

        label {
            font-size: 1.2em;
            color: #333;
            display: block;
            margin-bottom: 10px;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
        }

        button {
            background: #ff5e62;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #e0554d;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 1.5em;
            }

            button {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Appointment</h1>
        <form method="POST" action="">
            <label for="status">Status</label>
            <select name="status" required>
                <option value="Pending" <?php echo $appointment['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                <option value="Confirmed" <?php echo $appointment['status'] == 'Confirmed' ? 'selected' : ''; ?>>Confirmed</option>
                <option value="Cancelled" <?php echo $appointment['status'] == 'Cancelled' ? 'selected' : ''; ?>>Cancelled</option>
            </select>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
