<?php 

$db_name = "mysql:host=localhost;dbname=affroddin";  // Corrected typo and added semicolon
$username = "root";
$password = '';

try {
    // Create a new PDO instance
    $con = new PDO($db_name, $username, $password);
    
    // Set PDO error mode to exception to catch errors properly
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // If the connection is successful
    echo "Connection is successful";
} catch (PDOException $e) {
    // If an error occurs, it will be caught here
    echo "Connection failed: " . $e->getMessage();
}

?>
