<?php
session_start();
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM doctors WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "Invalid username or password.";
    }
}
?>
