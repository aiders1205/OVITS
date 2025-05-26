<?php
session_start();

// Check if the request ID is provided
if (isset($_POST['request_id'])) {
    $requestId = $_POST['request_id'];

    // Establish connection to the database
    $host = 'localhost';
    $db = 'ODRS';
    $user = 'root';
    $pass = '';
    $dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

    try {
        $connection = new PDO($dsn, $user, $pass);

        // Remove the request from the session as well
        unset($_SESSION['accepted'][$requestId]);

        $stmt = $connection->prepare("UPDATE student_requests SET status = 'pending' WHERE id = ?");
        $stmt->execute([$requestId]);

        $stmt = $connection->prepare("UPDATE admin_requests SET status = 'pending' WHERE id = ?");
        $stmt->execute([$requestId]);
        
        // Send a success response
        http_response_code(200);
        echo "Request canceled successfully.";
    } catch (PDOException $e) {
        // Handle database connection or query errors
        http_response_code(500);
        echo "Error canceling request: " . $e->getMessage();
    }
} else {
    // Send an error response if the request ID is not provided
    http_response_code(400);
    echo "Error: Request ID not provided.";
}
?>
