<html> 
    <head>
</head>

    <body>
    <a style="padding-right:20px;text-align:left;color:black;" href="index.php">HOME</a>
<a style="padding-right:20px;text-align:left;color:black;" href="doctor.php">SEE A DOCTOR</a>
<a style="padding-right:20px;text-align:left;color:black;" href="Appointmentss.php">APPOINTMENTS</a>
<a style="padding-right:20px;text-align:left;color:black;" href="bills.php">ACCOUNTANT AND BILLS</a>

</body>
</html>
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the most recent patient registered (or use any other query as needed)
$sql = "SELECT * FROM patients ORDER BY created_at DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output the most recent patient's data
    $row = $result->fetch_assoc();
    echo "<h2>Patient Registered:</h2>";
    echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
    echo "<p><strong>Age:</strong> " . $row['age'] . "</p>";
    echo "<p><strong>Gender:</strong> " . $row['gender'] . "</p>";
    echo "<p><strong>Contact:</strong> " . $row['contact'] . "</p>";
    echo "<p><strong>Address:</strong> " . $row['address'] . "</p>";
    echo "<p><strong>Medical History:</strong> " . $row['medical_history'] . "</p>";
} else {
    echo "<p>No patient data found.</p>";
}

$conn->close();
?>
