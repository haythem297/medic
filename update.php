<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); 
}

require_once('db.php');
session_regenerate_id();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    
    
    $query = "SELECT * FROM patients WHERE id = $id";
    $result = mysqli_query($db, $query);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone_number'];
        $rdv = $row['rdv'];
    } else {
        echo "Patient not found.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $rdv = $_POST['rdv'];

    $query = "UPDATE patients SET name = '$name', email = '$email', phone_number = '$phone', rdv='$rdv' WHERE id = $id";
    
    if (mysqli_query($db, $query)) {
        header("Location: dashboard.php");
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Patient</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="dashboard-container">
    <div class="update-container">
        <div class="y">
        <h2>Update Patient</h2>
        <form class="form-group action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="name">Name:</label>
            <input class="form-control" type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>
            <label for="email">Email:</label>
            <input class="form-control" type="email" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
            <label for="phone">Phone Number:</label>
            <input class="form-control" type="text" id="phone" name="phone" value="<?php echo $phone; ?>" required><br><br>
            <input class="form-control" type="date" id="rdv" name="rdv" value="<?php echo $rdv; ?>" required><br><br>
            <input class="form-control" type="submit" value="Update Patient">
        </form>
    </div>
    </div>

<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">


<script src="path/to/bootstrap/js/bootstrap.min.js"></script>
<script src="path/to/popper.js/popper.min.js"></script>
</body>
</html>
