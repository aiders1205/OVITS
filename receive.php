<?php
session_start();

if (!isset($_SESSION['adminId'])) {
    header("HTTP/1.1 401 Unauthorized");
    exit("Unauthorized access. Please log in as an admin.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['request_id'])) {
    $requestId = $_POST['request_id'];

    if (!is_numeric($requestId)) {
        header("HTTP/1.1 400 Bad Request");
        exit("Invalid request ID.");
    }

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

        $stmt = $connection->prepare("
            UPDATE requests 
            SET status = 'Received', date_received = NOW() 
            WHERE id = :id
        ");
        $stmt->execute([':id' => $requestId]);

        echo "Request #$requestId marked as Received.";
    } catch (PDOException $e) {
        header("HTTP/1.1 500 Internal Server Error");
        exit("Database error: " . $e->getMessage());
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    exit("Invalid request method or missing request ID.");
}
?>
