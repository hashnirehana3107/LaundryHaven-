<?php
session_start(); 

include "./dbconn.php";

if(isset($_POST['submit-btn'])){

     $name = $_POST['customer-name'];
        $rating = $_POST['rating'];
        $review_text = $_POST['review'] ?? ''; 
        
        
        
        $sql = "INSERT INTO feedback (Customer_Name, Rating, Feedback_Content) VALUES ('$name', '$rating', '$review_text')";
        $res = mysqli_query($dbconn, $sql);
        
        if ($res) {
            header('location:homepage.php'); 
        } else {
            header('location:homepage.php'); 
        }
}


?>