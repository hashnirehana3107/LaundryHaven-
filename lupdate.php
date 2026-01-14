<?php
require 'cusconfig.php';
$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$contact = $_POST['contactNo'];

$sql = "UPDATE inquiry SET fname = '$fname', lname = '$lname', contactno = '$contact'  WHERE inquiryid = '$id'";

if ($con1->query($sql)) {
    
    header('Location: ./csr-dashboard.php');
    
} else {
    
    echo "Error: " . $con1->error;
}
?>



?>
