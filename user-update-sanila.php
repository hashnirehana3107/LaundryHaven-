<?php 
    session_start();
    require "./dbconn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>

<link rel="icon" href="./Assets/IMG/favicon_io/favicon.ico" type="image/x-icon"/>

    <link rel="stylesheet" href="./CSS/update-sanila.css"> 
    <link rel="stylesheet" href="./CSS/admin-dashboard.css">
    
</head>
<body>

<?php 
    include "./dashboard-header-back.php"
?>

<div id="insert-form-wrapper">

    <h1>Update User Details</h1>

    <?php
        //if email exists in another user
        if (isset($_SESSION['user-update-error-messages'])) {
            foreach ($_SESSION['user-update-error-messages'] as $error) {
                echo "<div class='error-alert'>$error</div>";
            }
            unset($_SESSION['user-update-error-messages']);
        }


    ?>

        <?php

            $id = $_GET['id'];

            $sql = "SELECT 
                        RC.Customer_ID, RC.First_Name, RC.Last_Name, RC.Email,
                        A.First_Line, A.Second_Line, A.City
                    FROM 
                        registered_customer RC
                    LEFT JOIN 
                        reg_customer_address RCA ON RC.Customer_ID = RCA.Customer_ID
                    LEFT JOIN 
                        address A ON A.Address_ID = RCA.Address_ID
                    WHERE 
                        RC.Customer_ID = '$id'
                    ORDER BY 
                        RC.Customer_ID ASC;";

                    $res = mysqli_query($dbconn, $sql);

                    if (mysqli_num_rows($res) > 0) {
                        //values founr
                        $row = mysqli_fetch_assoc($res);
                        //key:value
                ?>


    <form method="post" action="./process_sanila.php">

        <input type="text" name="id" value="<?php echo $row['Customer_ID'] ?>" hidden>
                        
        <div class="input-field">
            <label for="first-name">First Name</label>
            <input type="text" name="first-name" id="first-name" value="<?php echo $row['First_Name'] ?>" required />
        </div>

        <div class="input-field">
            <label for="last-name">Last Name</label>
            <input type="text" name="last-name" id="last-name" value="<?php echo $row['Last_Name'] ?>" required />
        </div>

        <div class="input-field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $row['Email'] ?>" required />
        </div>

        <div class="input-field">
            <label for="address-line-1">Address Line 1</label>
            <input type="text" name="address-line-1" id="address-line-1" value="<?php echo $row['First_Line']; ?>"/>
        </div>

        <div class="input-field">
            <label for="address-line-2">Address Line 2</label>
            <input type="text" name="address-line-2" id="address-line-2" value="<?php echo $row['Second_Line']; ?>"/>
        </div>

        <div class="input-field">
            <label for="city">City</label>
            <input type="text" name="city" id="city" value="<?php echo $row['City']; ?>"/>
        </div>

        <input id="submit-btn" type="submit" name="edit-user" value="Update User" />
    </form>


    <?php        
            }
    ?>
</div>
    

</body>
</html>

