<?php
session_start();
date_default_timezone_set('Asia/Manila');

if (!isset($_SESSION['adminId'])) {
    header('HTTP/1.0 403 Forbidden');
    die('Access denied');
}

$host = 'localhost';
$db = 'ODRS';
$user = 'root';
$pass = '';
$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    $connection = new PDO($dsn, $user, $pass);

    if (isset($_POST['request_id'])) {
        $requestId = $_POST['request_id'];

        $updateStudentStmt = $connection->prepare("UPDATE student_requests SET status = 'Accepted', date_verified = NOW() WHERE id = :requestId");
        $updateStudentStmt->bindParam(':requestId', $requestId);

        $updateAdminStmt = $connection->prepare("UPDATE admin_requests SET status = 'Accepted', date_verified = NOW() WHERE id = :requestId");
        $updateAdminStmt->bindParam(':requestId', $requestId);

        if ($updateStudentStmt->execute() && $updateAdminStmt->execute()) {
            $_SESSION['accepted'][$requestId] = date("F j, Y \a\\t g:i A");
            echo json_encode(["status" => "Accepted", "date_verified" => date("F j, Y \a\\t g:i A")]);
        }
    } else {
        throw new Exception('Request ID not provided.');
    }
} catch (Exception $e) {
    header('HTTP/1.0 400 Bad Request');
    echo json_encode(["error" => $e->getMessage()]);
}
?>
