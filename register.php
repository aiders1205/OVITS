<?php
$studentId = $firstName = $lastName = $email = $password = $confirmPassword = "";
$errors = array();
$success_message = "";

// Database config
$host = 'localhost';
$db = 'ovits_db';
$db_user = 'root';
$db_pass = '';
$conn = new mysqli($host, $db_user, $db_pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentId = trim($_POST["studentId"]);
    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    // Validation
    if (empty($studentId)) {
        $errors[] = "Student ID is required";
    } elseif (!preg_match("/^[a-zA-Z0-9]{4,20}$/", $studentId)) {
        $errors[] = "Student ID must be 4–20 alphanumeric characters";
    }

    if (empty($firstName)) {
        $errors[] = "First name is required";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $firstName)) {
        $errors[] = "First name must contain only letters and spaces";
    }

    if (empty($lastName)) {
        $errors[] = "Last name is required";
    } elseif (!preg_match("/^[a-zA-Z\s]+$/", $lastName)) {
        $errors[] = "Last name must contain only letters and spaces";
    }

    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters long";
    }

    if ($password !== $confirmPassword) {
        $errors[] = "Passwords do not match";
    }

    // Check for existing studentId or email
    if (empty($errors)) {
        $check_query = $conn->prepare("SELECT * FROM users WHERE email = ? OR user_id = ?");
        $check_query->bind_param("ss", $email, $studentId);
        $check_query->execute();
        $result = $check_query->get_result();

        if ($result->num_rows > 0) {
            $errors[] = "Email or Student ID already exists.";
        }
        $check_query->close();
    }

    // Register user
    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $fullName = $firstName . ' ' . $lastName;

        $stmt = $conn->prepare("INSERT INTO users (user_id, full_name, email, password, role) VALUES (?, ?, ?, ?, 'student')");
        $stmt->bind_param("ssss", $studentId, $fullName, $email, $hashedPassword);

        if ($stmt->execute()) {
            $success_message = "Registration successful! You can now sign in.";
            $studentId = $firstName = $lastName = $email = $password = $confirmPassword = "";
        } else {
            $errors[] = "Something went wrong during registration. Please try again.";
        }

        $stmt->close();
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - OVITS</title>
    <link rel="stylesheet" href="stylesheets/ovits.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: sans-serif;
            background-image: url('Images/background.png');
            background-size: cover;
            background-repeat: no-repeat;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 80px 20px;
            min-height: calc(100vh - 200px);
        }

        .container {
            background: white;
            padding: 40px;
            width: 50%;
            max-width: 500px;
            border-radius: 15px;
            text-align: center;
            color: #737373;
            border: 1px solid rgb(219, 219, 219);
            margin: 60px 0;
        }

        .form-title {
            color: #111c4e;
            font-family: 'Times New Roman', Times, serif;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 30px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .content__form {
            display: flex;
            flex-direction: column;
            row-gap: 14px;
        }

        .content__inputs {
            display: flex;
            flex-direction: column;
            row-gap: 8px;
        }

        .form-row {
            display: flex;
            gap: 10px;
        }

        .form-row label {
            flex: 1;
        }

        .content__form label {
            border: 1px solid rgb(219, 219, 219);
            display: flex;
            align-items: center;
            position: relative;
            min-width: 200px;
            height: 38px;
            background: rgb(250, 250, 250);
            border-radius: 3px;
        }

        .content__form input {
            width: 100%;
            background: inherit;
            border: 0;
            outline: none;
            padding: 9px 8px 7px 8px;
            font-size: 16px;
        }

        .content__form span {
            position: absolute;
            left: 8px;
            font-size: 12px;
            pointer-events: none;
            transition: transform ease-out .1s;
        }

        .content__form input:valid+span,
        .content__form input:focus+span {
            transform: scale(0.833) translateY(-10px);
        }

        .content__form input:valid,
        .content__form input:focus {
            padding: 14px 0 2px 8px;
            font-size: 12px;
        }

        .content__form button {
            background: rgb(0, 149, 246);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 14px;
            padding: 10px 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        .content__form button:hover {
            background: rgb(24, 119, 242);
        }

        .error-messages {
            background: #ffe6e6;
            border: 1px solid #ff9999;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
            text-align: left;
        }

        .error-messages ul {
            margin: 0;
            padding-left: 20px;
            color: #cc0000;
            font-size: 14px;
        }

        .success-message {
            background: #e6ffe6;
            border: 1px solid #99cc99;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 15px;
            color: #006600;
            font-size: 14px;
        }

        .login-section {
            margin-top: 20px;
            text-align: center;
        }

        .login-text {
            color: #737373;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .login-btn {
            background: transparent;
            color: rgb(0, 149, 246);
            border: 2px solid rgb(0, 149, 246);
            border-radius: 8px;
            font-weight: 700;
            font-size: 14px;
            padding: 7px 16px;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .login-btn:hover {
            background: rgb(0, 149, 246);
            color: white;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            main {
                padding: 60px 15px;
                min-height: calc(100vh - 150px);
            }
            
            .container {
                width: 90%;
                margin: 40px 0;
                padding: 30px 20px;
            }

            .form-row {
                flex-direction: column;
                gap: 8px;
            }

            .form-title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="header-top">
        <div class="header-logo">
        <img src="images/image.png" alt="Logo" />
        </div>
        <div class="header-title-group">
        <p class="header-main-title"><a href="home.php">UNIVERSITY OF MAKATI</a></p>
        <p class="header-title">ONLINE VEHICLE IDENTIFICATION AND TRACKING SYSTEM</p>
        </div>
    </div>

    <div class="dropdown-container">
        <div class="dropdown">
        <button class="dropdown-btn">ABOUT</button>
        <div class="dropdown-content">
            <a href="aboutus.php">About Us</a>
            <a href="home.php">Home</a>
            <a href="policies.php">Policies</a>
        </div>
        </div>

        <div class="dropdown">
        <button class="dropdown-btn">APPLY NOW</button>
        <div class="dropdown-content">
            <a href="applynow.php">APPLY NOW</a>
        </div>
        </div>

        <div class="dropdown">
        <button class="dropdown-btn">HELP</button>
        <div class="dropdown-content">
            <a href="helpsupport.php">Contact Us</a>
        </div>
        </div>
    </div>

    <div>
        <a href="login.php">
        <button class="sign-in">Sign In</button>
        </a>
    </div>
</header>

    <main>
        <div class="container">
            <p class="form-title">CREATE ACCOUNT</p>
            
            <?php if (!empty($errors)): ?>
                <div class="error-messages">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if (!empty($success_message)): ?>
                <div class="success-message">
                    <?php echo htmlspecialchars($success_message); ?>
                </div>
            <?php endif; ?>

            <form class="content__form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="content__inputs">
                    <label>
                        <input required type="text" name="studentId" value="<?php echo htmlspecialchars($studentId); ?>">
                        <span>Student ID</span>
                    </label>
                    
                    <div class="form-row">
                        <label>
                            <input required type="text" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>">
                            <span>First Name</span>
                        </label>
                        <label>
                            <input required type="text" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>">
                            <span>Last Name</span>
                        </label>
                    </div>
                    
                    <label>
                        <input required type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                        <span>Email Address</span>
                    </label>
                    
                    <label>
                        <input required type="password" name="password">
                        <span>Password</span>
                    </label>
                    
                    <label>
                        <input required type="password" name="confirmPassword">
                        <span>Confirm Password</span>
                    </label>
                </div>
                <button type="submit">Create Account</button>
            </form>
            
            <!-- Login Link -->
            <div class="login-section">
                <p class="login-text">Already have an account?</p>
                <a href="login.php" class="login-btn">Sign In</a>
            </div>
        </div>
    </main>
</body>
</html>