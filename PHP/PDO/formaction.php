<?php
include 'connection.php';

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];

    $sql = "INSERT INTO users (name, email, password, phone) VALUES (:name, :email, :password, :phone)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':phone', $phone);
    
    if ($stmt->execute()) {
        echo "Signup successful! You can <a href='login.php'>login</a> now.";
    } else {
        echo "Error: Could not sign up.";
    }
}
?>
