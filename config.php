<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'avardeth');
    define('DB_PASSWORD', 'password');
    define('DB_DATABASE', 'woodpecker');
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

    if ($db->connect_error) {
        die("Connection failed: " . $conn->connect_error); 
    } else {
        //echo "Connected successfully";
    }
?>