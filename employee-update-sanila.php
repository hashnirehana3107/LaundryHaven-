<?php 
    session_start();
    require "./dbconn.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>


    <link rel="icon" href="./Assets/IMG/favicon_io/favicon.ico" type="image/x-icon"/>

    <link rel="stylesheet" href="./CSS/update-sanila.css"> 
    <link rel="stylesheet" href="./CSS/admin-dashboard.css">
    
</head>
<body>

<?php 
    include "./dashboard-header-back.php"
?>

<div id="insert-form-wrapper">

    <h1>Update Employee Details</h1>

    <?php
        // if email exists in another emploee
        if (isset($_SESSION['employee-update-error-messages'])) {
            foreach ($_SESSION['employee-update-error-messages'] as $error) {
                echo "<div class='error-alert'>$error</div>";
            }
            unset($_SESSION['employee-update-error-messages']);
        }

    ?>

        <?php

            $id = $_GET['id'];

            $sql = "SELECT  Employee_ID, 
                            Role, 
                            First_Name,
                            Last_Name, 
                            Email,
                            DOB  
                            FROM employees 
                            WHERE Employee_ID = '$id';";

            $res = mysqli_query($dbconn, $sql);

            if (mysqli_num_rows($res) > 0) {
                //values founr
                $row = mysqli_fetch_assoc($res);
                //key:value
                ?>


    <form method="post" action="./process_sanila.php">

        <input type="text" name="id" value="<?php echo $row['Employee_ID'] ?>" hidden>
                        
        <div class="input-field">
            <label for="role">Role</label>
            <select name="role" id="role" required>
                <option value="" disabled>Select Role</option><hr>
                <option value="Admin" <?php if($row['Role'] == 'Admin') echo 'selected'; ?>>Admin</option>
                <option value="Stock Manager" <?php if($row['Role'] == 'Stock Manager') echo 'selected'; ?>>Stock Manager</option>
                <option value="CSR" <?php if($row['Role'] == 'CSR') echo 'selected'; ?>>CSR</option>
            </select>
        </div>

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
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" id="dob" value="<?php echo $row['DOB'] ?>" required  />
        </div>


        <input id="submit-btn" type="submit" name="edit-employee" value="Update Employee" />
    </form>


    <?php        
            }
    ?>
</div>
    

</body>
</html>

