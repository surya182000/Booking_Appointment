<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Management System</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #ffffff;
        }

        .container {
            text-align: center;
            padding: 50px 20px;
        }

        header h1 {
            font-size: 3em;
            margin-bottom: 10px;
        }

        header p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }

        nav {
            margin: 30px 0;
        }

        .btn {
            text-decoration: none;
            display: inline-block;
            margin: 10px;
            padding: 15px 30px;
            background: #ffffff;
            color: #6a11cb;
            font-size: 1em;
            font-weight: bold;
            border-radius: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            background: #6a11cb;
            color: #ffffff;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        main h2 {
            font-size: 2.5em;
            margin: 40px 0 20px;
        }

        main p {
            font-size: 1.1em;
            line-height: 1.6;
            margin: 0 auto;
            max-width: 600px;
        }

        footer {
            margin-top: 50px;
            font-size: 0.9em;
            color: #d1d1d1;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to Appointment Management System</h1>
            <p>Book your appointments anytime, anywhere.</p>
        </header>
        <nav>
            <a href="login.php" class="btn">User Login</a>
            <a href="register.php" class="btn">Register</a>
            
        </nav>
        <main>
            <h2>Our Services</h2>
            <p>We offer an easy and efficient way to book appointments for various services. Choose your preferred service provider, date, and time in just a few clicks.</p>
        </main>
        
        <nav>
        <a href="admin_login.php" class="btn">Admin Login</a>
    </nav>
    <footer>
            <p>&copy; 2024 Appointment Management System. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>

