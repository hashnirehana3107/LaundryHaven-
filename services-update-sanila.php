<?php 
    session_start();
    require "./dbconn.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Services</title>

<link rel="icon" href="./Assets/IMG/favicon_io/favicon.ico" type="image/x-icon"/>

    <link rel="stylesheet" href="./CSS/update-sanila.css"> 
    <link rel="stylesheet" href="./CSS/admin-dashboard.css">
    
</head>
<body>

<?php 
    include "./dashboard-header-back.php"
?>

<div id="insert-form-wrapper">

    <h1>Update Services Details</h1>


        <?php

            $id = $_GET['id'];

            $sql = "SELECT  *  
                            FROM services 
                            WHERE Service_ID = '$id';";

            $res = mysqli_query($dbconn, $sql);

            if (mysqli_num_rows($res) > 0) {
                //values founr
                $row = mysqli_fetch_assoc($res);
                //key:value
            ?>


    <form method="post" action="./process_sanila.php">

        <input type="text" name="id" value="<?php echo $row['Service_ID'] ?>" hidden>
                        
        <div class="input-field">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $row['Service_Name'] ?>" required />
        </div>

        <div class="input-field">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="116" rows="10" required><?php echo $row['Description'] ?></textarea>
        </div>

        <div class="input-field">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" value="<?php echo $row['Price'] ?>" required />
        </div>

        <div class="input-field">
            <label for="img-path">Image Path</label> 
            <input type="text" name="img-path" id="img-path" value="<?php echo $row['Image_Path'] ?>" required />
        </div>

        <input id="submit-btn" type="submit" name="edit-service" value="Update Service" />
    </form>


    <?php        
            }
    ?>
</div>
    

</body>
</html>

