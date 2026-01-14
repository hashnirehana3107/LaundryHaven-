<?php

require 'cusconfig.php';

$cfname=$_POST['fname'];
$clname=$_POST['lname'];
$cemail=$_POST['email'];
$ccontact=$_POST['contactNo'];
$cinquiry=$_POST['inquiry'];

$sql="INSERT INTO inquiry(fname,lname,email,contactno,inquiry) VALUES('$cfname','$clname','$cemail','$ccontact','$cinquiry')";

if($con1->query($sql)){
    /*echo("<b>succesful</b>");*/
    header('location:homepage.php'); 
}else{
    echo("error".$con1->error);
    header('');
   
}
$con1->close();
?>