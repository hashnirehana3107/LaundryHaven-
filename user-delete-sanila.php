<?php

    session_start();
    require "./dbconn.php";

    $id = $_GET['id'];
    
    //get the address id for customer from customer address table
    $sql_get_address = "SELECT Address_ID FROM reg_customer_address WHERE Customer_ID = '$id'";
    $res_get_address = mysqli_query($dbconn, $sql_get_address);
    
    if ($res_get_address && mysqli_num_rows($res_get_address) > 0) {
        $address_row = mysqli_fetch_assoc($res_get_address); 
        $address_id = $address_row['Address_ID'];

        // Delete the row in customr addres table
        $sql_customer_address_del = "DELETE FROM reg_customer_address WHERE Customer_ID = '$id'";
        mysqli_query($dbconn, $sql_customer_address_del);

        // Delete the address from the address table
        $sql_address_del = "DELETE FROM address WHERE Address_ID = '$address_id'";
        mysqli_query($dbconn, $sql_address_del);
    }

    // delete the customer
    $sql_customer_del = "DELETE FROM registered_customer WHERE Customer_ID = '$id'";
    $res_customer_del = mysqli_query($dbconn, $sql_customer_del);

    if ($res_customer_del) { 
        $_SESSION['user-delete-success-message'] = true;
        header('location:admin-dashboard.php'); 
        exit();
    } 

?>