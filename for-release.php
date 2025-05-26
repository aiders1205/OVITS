<?php
session_start();

if (!isset($_SESSION['adminId'])) {
    header("HTTP/1.1 401 Unauthorized");
    exit("Unauthorized");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['request_id']) && isset($_POST['reason'])) {
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
        $reason = $_POST['reason'];

        // Update admin_requests table
        $stmt = $connection->prepare("UPDATE admin_requests SET Reason = :reason WHERE id = :id");
        $stmt->bindParam(':reason', $reason);
        $stmt->bindParam(':id', $requestId);
        $stmt->execute();

        // Update student_requests table
        $stmt = $connection->prepare("UPDATE student_requests SET Reason = :reason, status = 'For Release' WHERE id = :id");
        $stmt->bindParam(':reason', $reason);
        $stmt->bindParam(':id', $requestId);
        $stmt->execute();

        echo "Reason updated successfully for request ID: $requestId. Status set to 'For Release' in student_requests table.";
    } catch (PDOException $e) {
        header("HTTP/1.1 500 Internal Server Error");
        exit("Error: " . $e->getMessage());
    }
} else {
    header("HTTP/1.1 400 Bad Request");
    exit("Bad Request");
}
?>
