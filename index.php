<?php
// Database connection variables
$servername = "localhost";
$username = "root"; // Change this as needed
$password = "";     // Change this as needed
$dbname = "hospital_db"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from the form
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $medical_history = $_POST['medical_history'];

    // SQL query to insert form data into the database
    $sql = "INSERT INTO patients (name, age, gender, contact, address, medical_history) 
            VALUES ('$name', '$age', '$gender', '$contact', '$address', '$medical_history')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to doctor.php after successful registration
        header("Location: doctor.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <a style="padding-right:20px;text-align:left;color:black;" href="index.php">HOME</a>
    <a style="padding-right:20px;text-align:left;color:black;" href="doctor.php">SEE A DOCTOR</a>
    <a style="padding-right:20px;text-align:left;color:black;" href="Appointmentss.php">APPOINTMENTS</a>
    <a style="padding-right:20px;text-align:left;color:black;" href="bills.php">ACCOUNTANT AND BILLS</a>

    <div class="container mt-5">
        <h2>Patient Registration</h2>
        <form action="index.php" method="POST">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" class="form-control" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number:</label>
                <input type="text" class="form-control" id="contact" name="contact" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="medical_history">Medical History:</label>
                <textarea class="form-control" id="medical_history" name="medical_history" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>
</html>
