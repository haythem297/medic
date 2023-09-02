<?php
session_start();
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $rdv = $_POST['rdv'];

    $query = "INSERT INTO patients (name, email, phone_number, rdv) VALUES ('$name', '$email', '$phone','$rdv')";
    
    if (mysqli_query($db, $query)) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
?>
