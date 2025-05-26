<?php
session_start();

$host = 'localhost';
$db = 'ovits_db';
$user = 'root';
$pass = '';
$mysqli = new mysqli($host, $user, $pass, $db);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentId = $_POST['studentId'];
    $password = $_POST['password'];

    // Prepare and sanitize query
    $stmt = $mysqli->prepare("SELECT user_id, password, full_name, role FROM users WHERE email = ? OR user_id = ?");
    $stmt->bind_param("ss", $studentId, $studentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // NOTE: Replace this comparison with password_verify() if using hashed passwords
        if ($password === $user['password']) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                header("Location: admin-home.php");
            } else {
                header("Location: home.php");
            }
            exit();
        } else {
            $incorrect_info_warning = "Incorrect User ID or Password.";
        }
    } else {
        $incorrect_info_warning = "Incorrect User ID or Password.";
    }

    $stmt->close();
}

$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylesheets/ovits.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        html, body { height: 100%; }
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
            padding: 50px 40px 20px 40px;
            width: 50%;
            max-width: 400px;
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
        .content__form label {
            border: 1px solid rgb(219, 219, 219);
            display: flex;
            align-items: center;
            position: relative;
            min-width: 268px;
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
        .content__form input:valid+span {
            transform: scale(0.833) translateY(-10px);
        }
        .content__form input:valid {
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
            padding: 7px 16px;
            cursor: pointer;
        }
        .content__form button:hover {
            background: rgb(24, 119, 242);
        }
        .incorrect-info-warning {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }
        .register-section {
            margin-top: 20px;
            text-align: center;
        }
        .register-text {
            color: #737373;
            font-size: 14px;
            margin-bottom: 10px;
        }
        .register-btn {
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
        }
        .register-btn:hover {
            background: rgb(0, 149, 246);
            color: white;
        }
        @media (max-width: 768px) {
            main {
                padding: 60px 15px;
                min-height: calc(100vh - 150px);
            }
            .container {
                width: 90%;
                margin: 40px 0;
            }
        }
    </style>
</head>
<body>
<?php include("header.php"); ?>
<main>
    <div class="container">
        <p class="form-title">ONLINE VEHICLE IDENTIFICATION AND TRACKING SYSTEM</p>
        <form class="content__form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="content__inputs">
                <label>
                    <input required type="text" name="studentId" autocomplete="username">
                    <span>User ID</span>
                </label>
                <label>
                    <input required type="password" name="password" autocomplete="current-password">
                    <span>Password</span>
                </label>
            </div>
            <button type="submit">Sign In</button>
            <?php
            if (isset($incorrect_info_warning)) {
                echo "<div class='incorrect-info-warning'>$incorrect_info_warning</div>";
            }
            ?>
        </form>

        <div class="register-section">
            <p class="register-text">Don't have an account?</p>
            <a href="register.php">
                <button type="button" class="register-btn">Register</button>
            </a>
        </div>
    </div>
</main>
</body>
</html>
