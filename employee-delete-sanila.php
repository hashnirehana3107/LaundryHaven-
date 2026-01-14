<?php

    session_start();
    require "./dbconn.php";

    $id = $_GET['id'];
    

    // delete the customer
    $sql = "DELETE FROM employees WHERE Employee_ID = '$id'";
    $res = mysqli_query($dbconn, $sql);

    if ($res) { 
        $_SESSION['employee-delete-success-message'] = true;
        header('location:admin-dashboard.php'); 
        exit();
    } 

?>