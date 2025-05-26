<?php
session_start();
date_default_timezone_set('Asia/Manila');

$host = 'localhost';
$db = 'ovits_db';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $connection = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if admin is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Home</title>
    <link rel="icon" type="image/x-icon" href="Images/favicon.png">
    <link rel="stylesheet" href="Styles/admin-styles.css">
</head>
<body>

<?php include_once 'admin-header.php'; ?>

<div class="request-container">
    <h2 style="color:#111c4e;">Vehicle Sticker Applications</h2>

    <?php
    $stickerStmt = $connection->prepare("SELECT * FROM requests ORDER BY date_filed DESC");
    $stickerStmt->execute();
    $stickerRequests = $stickerStmt->fetchAll();

    if (count($stickerRequests) > 0) {
        foreach ($stickerRequests as $app) {
            $stickerId = htmlspecialchars($app['id']);
            echo "<div class='request-entry'>";
            echo "<div class='request-id'>";
            echo "<div class='control-number'><b>Request ID:</b> {$stickerId}</div>";
            echo "<div class='date-time'><b>Date Filed:</b> " . date("F j, Y g:i A", strtotime($app['date_filed'])) . "</div>";
            echo "<div class='date-time'><b>Status:</b> {$app['status']}</div>";
            echo "</div>";

            echo "<div class='request-details'>";
            echo "<p><strong>Name:</strong> {$app['first_name']} {$app['last_name']}</p>";
            echo "<p><strong>Email:</strong> {$app['email']}</p>";
            echo "<p><strong>Mobile:</strong> {$app['mobile']}</p>";
            echo "<p><strong>Position/Dept:</strong> {$app['position']}</p>";
            echo "<p><strong>Address:</strong> {$app['address']}</p>";
            echo "<p><strong>Vehicle:</strong> {$app['brand_model']} ({$app['vehicle_type']}, {$app['vehicle_color']})</p>";
            echo "<p><strong>Plate No.:</strong> {$app['plate_number']}</p>";
            echo "<p><strong>Driver's License:</strong> {$app['license_number']}</p>";
            echo "</div></div>";
        }
    } else {
        echo "<p style='text-align:center;'>No sticker applications found.</p>";
    }
    ?>
</div>

</body>
</html>
