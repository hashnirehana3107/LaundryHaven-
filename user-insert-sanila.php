<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>

<link rel="icon" href="./Assets/IMG/favicon_io/favicon.ico" type="image/x-icon"/>

    <link rel="stylesheet" href="./CSS/insert-sanila.css"> 
    <link rel="stylesheet" href="./CSS/admin-dashboard.css">
    
</head>
<body>

<?php 
    require "./dashboard-header-back.php"
?>

<div id="insert-form-wrapper">

    <h1>Add New User</h1>
        
        <?php
        //if email already exists
        if (isset($_SESSION['user-add-error-messages'])) {
            foreach ($_SESSION['user-add-error-messages'] as $error) {
                echo "<div class='error-alert'>$error</div>";
            }
            unset($_SESSION['user-add-error-messages']);
        }

        ?>

    <form method="post" action="./process_sanila.php">
        <div class="input-field">
            <label for="first-name">First Name</label>
            <input type="text" name="first-name" id="first-name" required />
        </div>

        <div class="input-field">
            <label for="last-name">Last Name</label>
            <input type="text" name="last-name" id="last-name" required />
        </div>

        <div class="input-field">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required />
        </div>

        <div class="input-field">
            <label for="address-line-1">Address Line 1</label>
            <input type="text" name="address-line-1" id="address-line-1"/>
        </div>

        <div class="input-field">
            <label for="address-line-2">Address Line 2</label>
            <input type="text" name="address-line-2" id="address-line-2"/>
        </div>
        
        <div class="input-field">
            <label for="city">City</label>
            <input type="text" name="city" id="city"/>
        </div>

        <input id="submit-btn" type="submit" name="add-user-reg" value="Add new user in to the system" />
    </form>
</div>
    

</body>
</html>

