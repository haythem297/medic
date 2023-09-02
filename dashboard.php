<?php
session_start(); 

require_once('db.php');


if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit; 
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
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                <?php
                require_once('db.php');
                $query = "SELECT * FROM patients";
                $result = mysqli_query($db, $query);
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone_number'] . "</td>";
                    echo "<td>" . $row['rdv'] . "</td>";
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


<div id="myModal" class="modal">

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
            <label for="phone">Date:</label>
            <input class="form-control" type="date" id="rdv" name="rdv" required><br><br>
            <input class="btn btn-primary" type="submit" value="Add Patient">
        </form>
    </div>
    
    </div>
  </div>

</div>
<script src="scripte.js"></script> 

<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

<script src="path/to/bootstrap/js/bootstrap.min.js"></script>
<script src="path/to/popper.js/popper.min.js"></script>
</body>
</html>
