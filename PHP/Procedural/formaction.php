<?php
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone'])) {
    // Database connection
    $conn = mysqli_connect('localhost', 'root', '', 'phpajax');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $languages = implode(",", $_POST['languages']);
    
    // Handle file upload
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $target_file);

    // Insert into user_login table
    $sql_login = "INSERT INTO user_login (phone) VALUES ('$phone')";
    if (mysqli_query($conn, $sql_login)) {
        $user_id = mysqli_insert_id($conn);

        // Insert into user_registration table
        $sql_registration = "INSERT INTO user_registration (user_id, name, email, phone, password, gender, course, languages, image) 
                             VALUES ('$user_id', '$name', '$email', '$phone', '$password', '$gender', '$course', '$languages', '$image')";
        
        if (mysqli_query($conn, $sql_registration)) {
            echo "User registered successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

