<?php 
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>

    <link rel="icon" href="./Assets/IMG/favicon_io/favicon.ico" type="image/x-icon"/>

    <link rel="stylesheet" href="./CSS/insert-sanila.css"> 
    <link rel="stylesheet" href="./CSS/admin-dashboard.css">
    
</head>
<body>

<?php 
    require "./dashboard-header-back.php"
?>

<div id="insert-form-wrapper">

    <h1>Add New Employee</h1>
        
        <?php
        // if email already exists
        if (isset($_SESSION['employee-add-error-messages'])) {
            foreach ($_SESSION['employee-add-error-messages'] as $error) {
                echo "<div class='error-alert'>$error</div>";
            }
            unset($_SESSION['employee-add-error-messages']);
        }

        ?>

    <form method="post" action="./process_sanila.php">
        <div class="input-field">
            <label for="role">Role</label>
            <select name="role" id="role" required>
                <option value="" disabled selected>Select Role</option><hr>
                <option value="Admin">Admin</option>
                <option value="Stock Manager">Stock Manager</option>
                <option value="CSR">CSR</option>
            </select>
        </div>
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
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" id="dob" required />
        </div>

    

        <input id="submit-btn" type="submit" name="add-employee" value="Add new employee in to the system" />
    </form>
</div>
    

</body>
</html>

