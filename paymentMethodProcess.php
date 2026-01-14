<?php

require './dbconn.php';

if (isset($_POST["add"])) {

    $cusId = $_POST["cusId"];

    $cardNo = $_POST["cardNo"];
    $cardHolder = $_POST["name"];
    $expMonth = $_POST["expDate"];
    $month = $_POST["expDate"];
    $cvc = $_POST["cvv"];

    if (
        empty($_POST["cusId"])
        || empty($_POST["cardNo"])
        || empty($_POST["name"])
        || empty($_POST["expDate"])
        || empty($_POST["cvv"])
    ) {
        header("location: ./customerDash.php?status=Fill All Data !");
        exit();
    } else {

        // set the time zone to Sri Lanka
        date_default_timezone_set('Asia/Colombo');

        // get the current time in Sri Lanka
        $realmonth = date('m');
        $realyear = date('Y');
        $currentDate = date('Y-m-d');

        // Using explode() to split the string into an array based on spaces
        $parts = explode("-", $month);

        $i = 0;
        // Output each part of the string
        foreach ($parts as $date[$i]) {
            $i++;
        }

        if (strlen($cardNo) != 12) {
            header("location: ./customerDash.php?status=Invalid Card No !");
            exit();
        }
        if (strlen($cardHolder) < 3 || strlen($cardHolder) > 50) {
            header("location: ./customerDash.php?status=Invalid Card Holder's Name !");
            exit();
        } elseif ($realmonth > $date[1]) {
            header("location: ./customerDash.php?status=Invalid Expiry Month !");
            exit();
        } elseif ($realyear > $date[0]) {
            header("location: ./customerDash.php?status=Invalid Expiry Year !");
            exit();
        } elseif (strlen($cvc) < 3 || strlen($cvc) > 3 || empty($cvc)) {
            header("location: ./customerDash.php?status=Invalid CVC No !");
            exit();
        } else {
            $q2 = "INSERT INTO `payment_method` (`cusId`,`cardHolder`,`cardNo`,`expMonth`,`cvv`) 
            VALUES ('$cusId','$cardHolder','$cardNo','$expMonth','$cvc')";
            $rs2 = $dbconn->query($q2);
            $dbconn->close();

            header("location: ./customerDash.php?status=Payment Method Successfully Added !");
            exit();
        }
    }
} else if (isset($_POST["update"])) {

    $payId = $_POST["methodId"];
    $cusId = $_POST["cusId"];

    $cardNo = $_POST["cardNo"];
    $cardHolder = $_POST["name"];
    $expMonth = $_POST["expDate"];
    $month = $_POST["expDate"];
    $cvc = $_POST["cvv"];

    if (
        empty($_POST["cusId"])
        || empty($_POST["cardNo"])
        || empty($_POST["name"])
        || empty($_POST["expDate"])
        || empty($_POST["cvv"])
        || empty($_POST["methodId"])
    ) {
        header("location: ./customerDash.php?status=Fill All Data !");
        exit();
    } else {

        // set the time zone to Sri Lanka
        date_default_timezone_set('Asia/Colombo');

        // get the current time in Sri Lanka
        $realmonth = date('m');
        $realyear = date('Y');
        $currentDate = date('Y-m-d');

        // Using explode() to split the string into an array based on spaces
        $parts = explode("-", $month);

        $i = 0;
        // Output each part of the string
        foreach ($parts as $date[$i]) {
            $i++;
        }

        if (strlen($cardNo) != 12) {
            header("location: ./customerDash.php?status=Invalid Card No !");
            exit();
        }
        if (strlen($cardHolder) < 3 || strlen($cardHolder) > 50) {
            header("location: ./customerDash.php?status=Invalid Card Holder's Name !");
            exit();
        } elseif ($realmonth > $date[1]) {
            header("location: ./customerDash.php?status=Invalid Expiry Month !");
            exit();
        } elseif ($realyear > $date[0]) {
            header("location: ./customerDash.php?status=Invalid Expiry Year !");
            exit();
        } elseif (strlen($cvc) < 3 || strlen($cvc) > 3 || empty($cvc)) {
            header("location: ./customerDash.php?status=Invalid CVC No !");
            exit();
        } else {
            $q1 = "UPDATE `payment_method` SET cusId = '" . $cusId . "', cardHolder = '" . $cardHolder . "', cardNo = '" . $cardNo . "', expMonth = '" . $expMonth . "', cvv = '" . $cvc . "' WHERE methodId = '" . $payId . "'";
            $rs1 = $dbconn->query($q1);

            $dbconn->close();

            header("location: ./customerDash.php?status=Payment Method Update Succeed !");
            exit();
        }
    }
} else if (isset($_POST["delete"])) {

    $payId = $_POST["methodId"];

    if (
        empty($_POST["methodId"])
    ) {
        header("location: ./customerDash.php?status=Delete Failed !");
        exit();
    } else {


        $q5 = "DELETE FROM `payment_method` WHERE methodId='" . $payId . "'";
        $rs5 = $dbconn->query($q5);

        $dbconn->close();

        header("location: ./customerDash.php?status=Payment Method Delete Succeed !");
        exit();
    }
} else {
    header("location: ./index.php?status=Payment Failed !");
    exit();
}
