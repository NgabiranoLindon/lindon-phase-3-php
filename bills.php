<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Patients</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<a style="padding-right:20px;text-align:left;color:black;" href="index.php">HOME</a>
<a style="padding-right:20px;text-align:left;color:black;" href="doctor.php">SEE A DOCTOR</a>
<a style="padding-right:20px;text-align:left;color:black;" href="Appointmentss.php">APPOINTMENTS</a>
<a style="padding-right:20px;text-align:left;color:black;" href="bills.php">ACCOUNTANT AND BILLS</a>

<div class="container mt-5">
    <h2>Patient Billing Form</h2>
    <form action="bills.php" method="POST">
        <div class="form-group">
            <label for="patientName">Patient Name</label>
            <input type="text" class="form-control" id="patientName" name="patientName" required>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Information</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


<div class="container mt-5">
    <h2>Billing Information</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $patientName = htmlspecialchars($_POST['patientName']);
        $amount = htmlspecialchars($_POST['amount']);
        
        echo "<h4>Patient Name: $patientName</h4>";
        echo "<h4>Amount: $amount</h4>";
    } else {
        echo "<h4>No billing information available.</h4>";
    }
    ?>
    <a href="bills.php" class="btn btn-primary mt-3">Back to Billing Form</a>
</div>
</body>
</html>
