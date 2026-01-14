<?php
require 'cusconfig.php';

$did = $_GET['id'];
$sql = "DELETE FROM csp WHERE id='$did'";
if ($con1->query($sql)) {
    header('Location: ./csr-dashboard.php');
    exit();
} else {
    echo "Failed to delete: " . $con1->error;
}
?>