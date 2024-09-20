<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $con->prepare($sql);
$stmt->bindParam(':id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($user['name']); ?></h2>
        
        <table>
            <tr>
                <th>Field</th>
                <th>Details</th>
            </tr>
            <tr>
                <td><strong>Name</strong></td>
                <td><?php echo htmlspecialchars($user['name']); ?></td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
            </tr>
            <tr>
                <td><strong>Phone</strong></td>
                <td><?php echo htmlspecialchars($user['phone']); ?></td>
            </tr>
        </table>

        <div class="edit-link">
            <a href="edit.php">Edit Profile</a>
            <a href="logout.php">Log Out</a>
        </div>
    </div>
</body>
</html>
