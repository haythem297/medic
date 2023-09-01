<?php
$db = mysqli_connect("localhost", "root", "", "doctor_dashboard");

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
