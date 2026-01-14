<?php

    session_start();
    require "./dbconn.php";

    $id = $_GET['id'];
    

    // delete the customer
    $sql = "DELETE FROM customer_order WHERE Order_id = '$id'";
    $res = mysqli_query($dbconn, $sql);

    if ($res) { 
        $_SESSION['order-delete-success-message'] = true;
        header('location:admin-dashboard.php'); 
        exit();
    } 

?>