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

        // Insert the data into delete_history
        $moveToHistoryStmt = $connection->prepare("
            INSERT INTO delete_history (id, firstname, lastname, email, message, date_filed, student_id, status, date_verified, date_received, file_name, file_type, file_size, reason)
            SELECT id, firstname, lastname, email, message, date_filed, student_id, 'Rejected', date_verified, date_received, file_name, file_type, file_size, :reason
            FROM admin_requests WHERE id = :requestId
        ");
        $moveToHistoryStmt->bindParam(':requestId', $requestId, PDO::PARAM_INT);
        $moveToHistoryStmt->bindParam(':reason', $reason, PDO::PARAM_STR);
        $moveToHistoryStmt->execute();

        // Update the status of the request to "rejected" for student_requests
        $updateStudentStmt = $connection->prepare("
            UPDATE student_requests SET status = 'Rejected', reason = :reason WHERE id = :requestId
        ");
        $updateStudentStmt->bindParam(':requestId', $requestId, PDO::PARAM_INT);
        $updateStudentStmt->bindParam(':reason', $reason, PDO::PARAM_STR);
        $updateStudentStmt->execute();

        // Delete the request from admin_requests table
        $deleteAdminStmt = $connection->prepare("DELETE FROM admin_requests WHERE id = ?");
        $deleteAdminStmt->execute([$requestId]);

        echo "Request successfully rejected and moved to delete history.";
    } catch (PDOException $e) {
        header("HTTP/1.1 500 Internal Server Error");
        exit("Error: " . $e->getMessage());
    }
}
?>
