<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "laundryheaven";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pickupDate = $_POST['pickupDate'];
$pickupTime = $_POST['pickupTime'];
$dropOffDate = $_POST['dropOffDate'];
$dropOffTime = $_POST['dropOffTime'];
$deliveryDate= $_POST['deliveryDate'];
$addressLine1 = $_POST['addressLine1'];
$addressLine2 = $_POST['addressLine2'];
$city = $_POST['city'];
$landmarks = $_POST['landmarks'];
$deliveryService = $_POST['deliveryService'];

$sql = "INSERT INTO delivery_details (Pickup_Date, Pickup_Time, Drop_Off_Date, Drop_Off_Time, Delivery_Date,  First_Line, Second_Line, City, Special_Landmarks, Order_Id, Delivery_Service_ID) 
        VALUES ('$pickupDate', '$pickupTime', '$dropOffDate', '$dropOffTime', '$deliveryDate', '$addressLine1', '$addressLine2', '$city', '$landmarks', '3', '$deliveryService')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Appointment successfully created!'); window.location.href='feedback-page-sanila.php';</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
