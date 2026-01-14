<?php 
    session_start();
    require "./dbconn.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>

<link rel="icon" href="./Assets/IMG/favicon_io/favicon.ico" type="image/x-icon"/>

    <link rel="stylesheet" href="./CSS/update-sanila.css"> 
    <link rel="stylesheet" href="./CSS/admin-dashboard.css">
    
</head>
<body>

<?php 
    include "./dashboard-header-back.php"
?>

<div id="insert-form-wrapper">

    <h1>Update Order Status</h1>

    <?php
        // if email exists in another emploee
        // if (isset($_SESSION['employee-update-error-messages'])) {
        //     foreach ($_SESSION['employee-update-error-messages'] as $error) {
        //         echo "<div class='error-alert'>$error</div>";
        //     }
        //     unset($_SESSION['employee-update-error-messages']);
        // }

    ?>

        <?php

            $id = $_GET['id'];

            $sql = "SELECT Order_id, 
                            Order_Status, 
                            Order_Amount,
                            Order_Date 
                            FROM customer_order 
                            WHERE Order_id = '$id';"; 

            $res = mysqli_query($dbconn, $sql);

            if (mysqli_num_rows($res) > 0) {
                //values founr
                $row = mysqli_fetch_assoc($res);
                //key:value
                ?>


    <form method="post" action="./process_sanila.php">

        <input type="text" name="id" value="<?php echo $row['Order_id'] ?>" hidden>
                        
        <div class="input-field">
            <label for="order-status">Order Status</label>
            <select name="order-status" id="order-status" required>
                <option value="" disabled>Select Status</option><hr>
                <option value="Pending" <?php if($row['Order_Status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                <option value="Completed" <?php if($row['Order_Status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                <option value="In Progress" <?php if($row['Order_Status'] == 'In Progress') echo 'selected'; ?>>Cancelled</option>
                <option value="Cancelled" <?php if($row['Order_Status'] == 'Cancelled') echo 'selected'; ?>>In Progress</option>
            </select>
        </div>


        <input id="submit-btn" type="submit" name="update-order-status" value="Update Order Status" />
    </form>


    <?php        
            }
    ?>
</div>
    

</body>
</html>

