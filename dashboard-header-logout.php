<?php 
    include "./dbconn.php"
?>

<section id="dashboard-header">
        <div id="header-img-text-wrapper">
            <div id="img-wrapper">
                <img src="./Assets/IMG/user.png" alt="Profile Picture">
            </div>
            <div id="text-wrapper">
                <h2><?php 

                if ($_SESSION['user_role'] === 'Customer') {
                    $sql = "SELECT First_Name, Last_Name FROM registered_customer WHERE Email = '{$_SESSION['logged_in_user']}'";
                } else {
                    $sql = "SELECT First_Name, Last_Name FROM employees WHERE Email = '{$_SESSION['logged_in_user']}'";
                }
                $result = mysqli_query($dbconn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo $row['First_Name'] . ' ' . $row['Last_Name'];

                ?></h2>
                <p class="role"><?php echo $_SESSION['user_role']; ?></p>
                <p>Welcome to <?php echo $_SESSION['user_role']; ?> Dashboard!</p>
            </div>
        </div>
        <a href="./logout.php"><button id="logout-button" name="logout">Logout</button></a>
    </section>