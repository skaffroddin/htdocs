<?php
if (isset($_POST['login_email_phone']) && isset($_POST['login_password'])) {
    // Database connection
    $conn = mysqli_connect('localhost', 'root', '', 'phpajax');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $login_input = mysqli_real_escape_string($conn, $_POST['login_email_phone']);
    $password_input = $_POST['login_password'];

    // Check email or phone
    $sql = "SELECT * FROM user_registration WHERE email = '$login_input' OR phone = '$login_input'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        if (password_verify($password_input, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['name'] = $user['name'];
            echo "Login successful! <a href='display.php'>Go to Dashboard</a>";
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "Invalid email or phone!";
    }

    mysqli_close($conn);
}
?>

