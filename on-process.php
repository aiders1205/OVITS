<?php
session_start();

if (!isset($_SESSION['adminId'])) {
    header("HTTP/1.1 401 Unauthorized");
    exit("Unauthorized");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['request_id'])) {
    $host = 'localhost';
    $db = 'ODRS';
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

        $requestId = $_POST['request_id'];
        
        // Update the status of the request to "On Process"
        $stmt = $connection->prepare("UPDATE student_requests SET status = 'On Process' WHERE id = ?");
        $stmt->execute([$requestId]);

        echo "Request status updated to On Process.";
    } catch (PDOException $e) {
        header("HTTP/1.1 500 Internal Server Error");
        exit("Error: " . $e->getMessage());
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    exit("Bad Request");
}
?>
