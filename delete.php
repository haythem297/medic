<?php
session_start();
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "DELETE FROM patients WHERE id = $id";
    
    if (mysqli_query($db, $query)) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
?>
