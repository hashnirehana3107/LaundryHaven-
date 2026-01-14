<?php

require 'cusconfig.php';
$price=$_POST['discounted-price'];
$hmethod=$_POST['methodOfPayment'];
$hname=$_POST['holdername'];
$hcardno=$_POST['cardnumber'];
$hmonth=$_POST['month'];
$hyear=$_POST['year'];
$hcvv=$_POST['inputcvv'];


$sql="INSERT INTO csp(price,method,holder,cnumber,month,year,cvv)  VALUES('$price','$hmethod','$hname','$hcardno','$hmonth','$hyear','$hcvv')";
if($con1->query($sql)){
    
    header('location:feedback-page-sanila.php');  
}else{
    echo("error".$con1->error);
}
$con1->close();
?>

?>