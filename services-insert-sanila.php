<?php 
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Services</title>
<link rel="icon" href="./Assets/IMG/favicon_io/favicon.ico" type="image/x-icon"/>

    <link rel="stylesheet" href="./CSS/insert-sanila.css"> 
    <link rel="stylesheet" href="./CSS/admin-dashboard.css">
    
</head>
<body>

<?php 
    require "./dashboard-header-back.php";
?>

<div id="insert-form-wrapper">

    <h1>Add New Service</h1>
        

    <form method="post" action="./process_sanila.php">
   

        <div class="input-field">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required />
        </div>

        <div class="input-field">
            <label for="description">Description</label>
            <textarea name="description" id="description" required cols="116" rows="10"></textarea>
        </div>

        <div class="input-field">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" required />
        </div>

        <div class="input-field">
            <label for="img-path">Image Path</label> 
            <input type="text" name="img-path" id="img-path" required />
        </div>

    

        <input id="submit-btn" type="submit" name="add-service" value="Add new service" />
    </form>
</div>
    

</body>
</html>

