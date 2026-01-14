<!DOCTYPE html>
<html>
<head>
    <title>Update Information</title>
    <link rel="stylesheet" href="./CSS/iupdate.css">
</head>
<body>
    <h2>Update Customer information</h2>

    <?php
    require 'cusconfig.php';
    $id = $_GET['id'];

    
    $sql = "SELECT * FROM inquiry WHERE inquiryid='$id'";
    $res = mysqli_query($con1, $sql);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
    ?>
  
    <form action="./lupdate.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <label for="Fname"><b>First Name:</b></label><br>
        <input type="text" name="fname" id="Fname" class="inputs" value="<?php echo $row['fname']; ?>"><br>
        
        <label for="Lname"><b>Last Name:</b></label><br>
        <input type="text" name="lname" id="Lname" class="inputs" value="<?php echo $row['lname']; ?>"><br>
        
        <label for="ContactNo"><b>Contact Number:</b></label><br>
        <input type="tel" name="contactNo" id="ContactNo" class="inputs" value="<?php echo $row['contactno']; ?>"><br>
        
        <input type="submit" value="Update" class="update">
        <input type="reset" value="Reset" class="reset">
    </form>
    
    <?php
    } else {
        echo "No record found.";
    }
    ?>
</body>
</html>