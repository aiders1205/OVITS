<?php
session_start();

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
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University of Makati - Online Academic Records Request</title>
    <link rel="icon" type="image/x-icon" href="Images/favicon.png">
    <link rel="stylesheet" href="Styles/styles.css">
</head>
<body>

<?php include_once 'admin-header.php';?>

<div class="request-container">
    <?php
    if ($connection) {
        $stmt = $connection->prepare("
           SELECT * FROM archive 
           ORDER BY date_received DESC
       ");
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch()) {
                $controlNumber = date("mdY") . '-' . $row['id'];
                $formattedDate = date("F j, Y \a\\t g:i A", strtotime($row['date_filed']));
                $requestId = $row['id'];

                echo "<div class='request-entry' id='request-entry-{$requestId}'>";
                
                echo "<div class='request-id'>";
                echo "<div class='control-number' style='font-size: 20px;'><b>CONTROL NUMBER:</b><br>{$controlNumber}</div>";
                echo "<div class='date-time' style='font-size: 20px;'><b>Date and time filed:</b><br>{$formattedDate}</div>";
                echo "</div>"; // Close .request-id

                echo "<div class='request-details'>";
                echo "<div class='detail' style='font-size: 20px;'><span class='label'>Name:</span> " . htmlspecialchars($row['firstname']) . " " . htmlspecialchars($row['lastname']) . "</div>";
                echo "<div class='detail' style='font-size: 20px;'><span class='label'>Student ID:</span> " . htmlspecialchars($row['student_id']) . "</div>";
                echo "<div class='detail' style='font-size: 20px;'><span class='label'>Purpose:</span> " . htmlspecialchars($row['message']) . "</div>";
                echo "<div class='detail' style='font-size: 20px;'><span class='label'>Uploaded File:</span>";

                $fileLinks = explode(',', $row['file_name']);
                
                foreach ($fileLinks as $fileLink) {
                    if (!empty($fileLink)) {
                        echo " <a href='uploads/{$fileLink}' target='_blank'>{$fileLink}</a><br>";
                    }
                }

                echo "</div>";
                echo "</div>"; // Close .request-details


                echo "<div class='request-status' style='font-size: 20px;'>";
                $receivedDateTime = date("F j, Y \a\\t g:i A", strtotime($row['date_received']));
                echo "Date and time received: <br>{$receivedDateTime}";
                echo "</div>"; // Close .request-status

                echo "</div>"; // Close .request-entry
            }
        } else {
            echo "No Requests Found.";
        }
    } else {
        echo "Failed to connect to the database.";
    }
    ?>
</div>
</body>
</html>
