<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// MySQLi Procedural connection
$conn = mysqli_connect('localhost', 'root', '', 'phpajax');
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM user_registration WHERE user_id = $user_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    echo "<h1>Welcome, " . $user['name'] . "</h1>";
    echo "<p>Email: " . $user['email'] . "</p>";
    echo "<p>Phone: " . $user['phone'] . "</p>";
    echo "<p>Course: " . $user['course'] . "</p>";
    echo "<p>Languages: " . $user['languages'] . "</p>";
    echo "<p><img src='uploads/" . $user['image'] . "' alt='Profile Image' width='150'></p>";
} else {
    echo "No user found!";
}

mysqli_close($conn);
?>

