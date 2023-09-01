<?php
session_start();
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $query = "INSERT INTO patients (name, email, phone_number) VALUES ('$name', '$email', '$phone')";
    
    if (mysqli_query($db, $query)) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
?>
