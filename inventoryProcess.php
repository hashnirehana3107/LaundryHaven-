<?php

require "./dbconn.php";


if (isset($_POST["add"])) {

    $itemName = $_POST["itemName"];
    $iQuantity = (int)$_POST["iQuantity"];
    $iStatus = $_POST["iStatus"];
    $rlevel = (int)$_POST["rlevel"];

    if (
        empty($_POST["itemName"])
        || empty($_POST["iQuantity"])
        || empty($_POST["iStatus"])
        || empty($_POST["rlevel"])
    ) {
        header("location: ./managerDash.php?status=Fill All Data!");
        exit();
    } else {

        if (strlen($itemName) < 3 || strlen($itemName) > 50) {
            header("location: ./managerDash.php?status=Invalid Item Name Length !");
            exit();
        } elseif (!is_int($iQuantity)) {
            header("location: ./managerDash.php?status=Invalid Quantity !");
            exit();
        } elseif (strlen($iStatus) < 3 || strlen($iStatus) > 15) {
            header("location: ./managerDash.php?status=Invalid Item Status !");
            exit();
        } elseif (!is_int($rlevel)) {
            header("location: ./managerDash.php?status=Invalid Reorder Level !");
            exit();
        } else {
            $q2 = "INSERT INTO `inventoryManagement` (`Item_Name`,`Item_Quantity`,`Item_Status`,`Reorder_Level`,`Stock_Manager_ID`) 
            VALUES ('" . $itemName . "','" . $iQuantity . "','" . $iStatus . "','" . $rlevel . "','2')";
            $rs2 = $dbconn->query($q2);
            $dbconn->close();

            header("location: ./managerDash.php?status=Item Successfully Added to Inventory !");
            exit();
        }
    }
} else if (isset($_POST["update"])) {

    $inventId = $_POST["inventId"];
    $itemName = $_POST["itemName"];
    $iQuantity = (int)$_POST["iQuantity"];
    $iStatus = $_POST["iStatus"];
    $rlevel = (int)$_POST["rlevel"];

    if (
        empty($_POST["itemName"])
        || empty($_POST["iQuantity"])
        || empty($_POST["iStatus"])
        || empty($_POST["rlevel"])
        || empty($_POST["inventId"])
    ) {
        header("location: ./managerDash.php?status=Fill All Data !");
        exit();
    } else {

        if (strlen($itemName) < 3 || strlen($itemName) > 50) {
            header("location: ./managerDash.php?status=Invalid Item Name Length !");
            exit();
        } elseif (!is_int($iQuantity)) {
            header("location: ./managerDash.php?status=Invalid Quantity !");
            exit();
        } elseif (strlen($iStatus) < 3 || strlen($iStatus) > 15) {
            header("location: ./managerDash.php?status=Invalid Item Status !");
            exit();
        } elseif (!is_int($rlevel)) {
            header("location: ./managerDash.php?status=Invalid Reorder Level !");
            exit();
        } else {

            $q1 = "UPDATE `inventoryManagement` SET Item_Name = '" . $itemName . "', Item_Quantity = '" . $iQuantity . "', Item_Status = '" . $iStatus . "', Reorder_Level = '" . $rlevel . "' WHERE Inventory_ID = '" . $inventId . "'";
            $rs1 = $dbconn->query($q1);

            $dbconn->close();

            header("location: ./managerDash.php?status=Inventory Update Succeed !");
            exit();
        }
    }
} else if (isset($_POST["delete"])) {

    $inventId = $_POST["inventId"];

    if (
        empty($_POST["inventId"])
    ) {
        header("location: ./managerDash.php?status=Delete Failed !");
        exit();
    } else {


        $q5 = "DELETE FROM `inventoryManagement` WHERE Inventory_ID='" . $inventId . "'";
        $rs5 = $dbconn->query($q5);

        $dbconn->close();

        header("location: ./managerDash.php?status=Delete Succeed !");
        exit();
    }
} else {
    header("location: ./index.php?status=Payment Failed !");
    exit();
}
