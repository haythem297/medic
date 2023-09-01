<?php
session_start(); // Start the session

require_once('db.php');

// Check if the user is logged in, if not, redirect to the login page
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit; // Ensure the script stops executing after the redirect
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="dashboard-container">
<ul>
  <li><a href="#home">Welcome <?php echo $_SESSION['username']; ?></a></li>
  <li style="float:right"><a class="active" href="logout.php">Logout</a></li>
</ul>
  
    <div class="dashboard-container">
        <h3 class="x">Patients List</h3>
        <table id="customers">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Display patients here using PHP -->
                <?php
                require_once('db.php');
                $query = "SELECT * FROM patients";
                $result = mysqli_query($db, $query);
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone_number'] . "</td>";
                    echo "<td>";
                    ?><button type="button" class="btn btn-warning"><?php echo "<a class='texts' href='update.php?id=" . $row['id'] . "'>Update</a> "; ?></button>
                    <button type="button" class="btn btn-danger"><?php echo "<a class='texts' href='delete.php?id=" . $row['id'] . "'>Delete</a>"; ?></button><?php
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <button class="btn btn-primary" id="myBtn">Add Patient</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
<div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h3>Add Patient</h3>
    </div>
    <div class="modal-body">
    
        <form class="form-group" action="add_patient.php" method="post">
            <label for="name">Name:</label>
            <input class="form-control" type="text" id="name" name="name" required><br><br>
            <label for="email">Email:</label>
            <input class="form-control" type="email" id="email" name="email" required><br><br>
            <label for="phone">Phone Number:</label>
            <input class="form-control" type="text" id="phone" name="phone" required><br><br>
            <input class="btn btn-primary" type="submit" value="Add Patient">
        </form>
    </div>
    
    </div>
  </div>

</div>
<script src="scripte.js"></script> <!-- Include JavaScript file -->
<!-- Add Bootstrap CSS -->
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

<!-- Add Bootstrap JavaScript and Popper.js (required for certain Bootstrap components) -->
<script src="path/to/bootstrap/js/bootstrap.min.js"></script>
<script src="path/to/popper.js/popper.min.js"></script>
</body>
</html>
