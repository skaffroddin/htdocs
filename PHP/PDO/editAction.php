<?php
include 'connection.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['update'])) {
    $user_id = $_SESSION['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE users SET name = :name, email = :email, password = :password, phone = :phone WHERE id = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':password', $password);
    } else {
        $sql = "UPDATE users SET name = :name, email = :email, phone = :phone WHERE id = :id";
        $stmt = $con->prepare($sql);
    }

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':id', $user_id);

    if ($stmt->execute()) {
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        header("Location: display.php");
        exit();
    } else {
        echo "Error: Unable to update profile.";
    }
}
?>
