<?php
// Database connection
$servername = "localhost";
$username = "root";  // Update with your MySQL username
$password = "";      // Update with your MySQL password
$dbname = "hospital_db";  // Name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Simulated doctor availability
$doctors = [
    'Dr. Smith' => 'Available',
    'Dr. Johnson' => 'Unavailable',
    'Dr. Lindon' => 'Available',
];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data and sanitize it
    $doctor = htmlspecialchars($_POST['doctor']);
    $date = htmlspecialchars($_POST['date']);
    $time = htmlspecialchars($_POST['time']);
    
    // Insert appointment data into the database
    $sql = "INSERT INTO appointments (doctor_name, appointment_date, appointment_time) 
            VALUES ('$doctor', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        $successMessage = "Appointment booked successfully with <strong>$doctor</strong> on <strong>$date</strong> at <strong>$time</strong>.";
    } else {
        $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
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
    <h2>Book an Appointment</h2>
    
    <?php if (isset($successMessage)) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $successMessage; ?>
        </div>
    <?php } elseif (isset($errorMessage)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMessage; ?>
        </div>
    <?php } ?>

    <form action="Appointmentss.php" method="POST">
        <div class="form-group">
            <label for="doctor">Select Doctor:</label>
            <select class="form-control" id="doctor" name="doctor" required>
                <option value="">Select Doctor</option>
                <?php foreach ($doctors as $name => $status): ?>
                    <option value="<?php echo $name; ?>"><?php echo "$name ($status)"; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <button type="submit" class="btn btn-primary">Book Appointment</button>
    </form>

    <h3 class="mt-5">Doctor Availability</h3>
    <ul class="list-group">
        <?php foreach ($doctors as $name => $status): ?>
            <li class="list-group-item">
                <?php echo "$name: <strong>$status</strong>"; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</div>

</body>
</html>
  