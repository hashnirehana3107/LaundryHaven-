<?php
require 'cusconfig.php';

$did = $_GET['id']; 
$sql = "DELETE FROM inquiry WHERE inquiryid='$did'"; 
if ($con1->query($sql)) {
    header('Location: ./csr-dashboard.php');
    
} else {
    echo "Failed to delete: " . $con1->error;
}
?>