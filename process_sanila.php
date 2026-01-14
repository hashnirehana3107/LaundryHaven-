<?php

        //references
        //1 Hotel Website | PHP MySQL Bootstrap | Home page and Login Register | CRUD  by Krishan Ranaweera ("https://youtu.be/2nEFQFFFSm4?si=1mLEGc3A2rNjZkUr")

        //Login and Registration Form in PHP and MySQL by AUZ Tutorials ("https://youtu.be/2MpZwFoBPjQ?si=9MbzNJW7A2vB1lDr)

        require "./dbconn.php";
        session_start();

        if (isset($_POST["signup"])) {

            $fName = $_POST["first-name"];
            $lName = $_POST["last-name"];
            $email = $_POST["email"];
            $pw = $_POST["password"];
            $repeatpw = $_POST["confirm-password"];

            $pw_hash = password_hash($pw, PASSWORD_DEFAULT);


            $errors = array();

            $sql = "SELECT * FROM registered_customer WHERE Email = '$email'";
            $res = mysqli_query($dbconn, $sql);
            $rowCount = mysqli_num_rows($res);

            if ($rowCount > 0) {
                array_push($errors, "Email already exists!");
            }

            if($pw !== $repeatpw){
                array_push($errors, "Passwords don't match!");
            }

            if (count($errors) > 0) {
                $_SESSION['signup-error-messages'] = $errors;
                header('location:homepage.php'); 
                exit();
            }



            $sql = "INSERT INTO registered_customer (First_Name, Last_Name, Email, Password) VALUES ('$fName', '$lName', '$email', '$pw_hash');";
            $res = mysqli_query($dbconn, $sql); 

            if ($res) {
                // echo "Successfully Inserted";
                $_SESSION['signup_success'] = true; 
                $_SESSION['signup-success-message'] = true;
                header('location:homepage.php'); 
                exit();
            } else {
                // echo "Failed to Insert";
                $_SESSION['signup_error'] = true;
                header('location:homepage.php'); 
                exit();
            }
         }    


         //login procedure
         if (isset($_POST["login"])) {

            $email = $_POST["email"];
            $pw = $_POST["signin-password"];

            // Check in registered customer first
            $sql = "SELECT * FROM registered_customer WHERE Email = '$email'";
            $result = mysqli_query($dbconn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $customer = mysqli_fetch_assoc($result);

                if (password_verify($pw, $customer['Password'])) {
                    $_SESSION['logged_in_user'] = $email;
                    $_SESSION['user_role'] = 'Customer';
                    header('location:customerDash.php'); 
                } else {
                    $_SESSION['login-error'] = true;
                    header('location:homepage.php');
                    exit();
                }
            } else {
                // Check in employees table if not found in registered_customer
                $sql = "SELECT * FROM employees WHERE Email = '$email'";
                $result = mysqli_query($dbconn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $employee = mysqli_fetch_assoc($result);

            
                    if ($pw === $employee['Password']) {
                        $_SESSION['logged_in_user'] = $email;
                        $_SESSION['user_role'] = $employee['Role'];

                        // Check user role
                        switch ($employee['Role']) {
                            case 'Admin':
                                header('location:admin-dashboard.php');
                                break;
                            case 'CSR':
                                header('location:csr-dashboard.php');
                                break;
                            case 'Stock Manager':
                                header('location:managerDash.php');
                                break;
                            default:
                                header('location:customerDash.php');
                                break;
                        }
                    } else {
                        $_SESSION['login-error'] = true;
                        header('location:homepage.php');
                        exit();
                    }
                } else {
                    $_SESSION['login-error'] = true;
                    header('location:homepage.php');
                    exit();
                }
            }
         }

         //add user through admin
         if(isset($_POST['add-user-reg'])){

            $fName = $_POST["first-name"];
            $lName = $_POST["last-name"];
            $email = $_POST["email"];
            $addressL1 = $_POST["address-line-1"];
            $addressL2 = $_POST["address-line-2"];
            $city = $_POST["city"];

            $errors = array();

            $sql = "SELECT * FROM registered_customer WHERE Email = '$email'";
            $res = mysqli_query($dbconn, $sql);
            $rowCount = mysqli_num_rows($res);

            if ($rowCount > 0) {
                array_push($errors, "Email already exists!");
            }

            if (count($errors) > 0) {
                $_SESSION['user-add-error-messages'] = $errors;
                header('location:user-insert-sanila.php'); 
                exit();
            }

            

            $sql_Reg_User = "INSERT INTO registered_customer (First_Name, Last_Name, Email) VALUES ('$fName', '$lName', '$email');";
            $res_Reg_User = mysqli_query($dbconn, $sql_Reg_User); 

            // Get the last inserted customer ID
            $customer_id = mysqli_insert_id($dbconn);

            $sql_Address = "INSERT INTO address (First_Line, Second_Line, City) VALUES ('$addressL1', '$addressL2', '$city');";
            $res_Address = mysqli_query($dbconn, $sql_Address); 

            // Get the last inserted address ID
            $address_id = mysqli_insert_id($dbconn);

            $sql_Customer_Address = "INSERT INTO reg_customer_address (Customer_ID, Address_ID) VALUES ('$customer_id', '$address_id');";
            $res_Customer_Address =  mysqli_query($dbconn, $sql_Customer_Address);

            

            if ($res_Reg_User && $res_Address && $res_Customer_Address) {
 
                $_SESSION['user-add-success-messages'] = true;
                header('location:admin-dashboard.php'); 
                exit();
            } else {

                $_SESSION['insert-fail'] = true;  
                header('location:user-insert-sanila.php'); 
                exit();
            }
         }


         //user update through admin

         if(isset($_POST['edit-user'])){
            $id = $_POST["id"];
            $fName = $_POST["first-name"];
            $lName = $_POST["last-name"];
            $email = $_POST["email"];
            $addressL1 = $_POST["address-line-1"];
            $addressL2 = $_POST["address-line-2"];
            $city = $_POST["city"];

            $errors = array();

            $sql = "SELECT * FROM registered_customer WHERE Email = '$email' AND Customer_ID != '$id'";
            $res = mysqli_query($dbconn, $sql);
            $rowCount = mysqli_num_rows($res);

            if ($rowCount > 0) {
                array_push($errors, "Email already exists!");
            }

            if (count($errors) > 0) {
                $_SESSION['user-update-error-messages'] = $errors;
                header('location:user-update-sanila.php?id=' . $id); 
                exit();
            }

            // Check if an address exists for the user
            $sql_Check_Address = "SELECT Address_ID FROM reg_customer_address WHERE Customer_ID = '$id';";
            $res_Check_Address = mysqli_query($dbconn, $sql_Check_Address);
            
            if (mysqli_num_rows($res_Check_Address) > 0) {
                // Update existing address
                $sql_Address = "UPDATE address SET 
                                        First_Line = '$addressL1', 
                                        Second_Line = '$addressL2', 
                                        City = '$city' 
                                        WHERE Address_ID = (SELECT Address_ID 
                                                                FROM reg_customer_address 
                                                                WHERE Customer_ID = '$id'
                                                            );"; 
                $res_Address = mysqli_query($dbconn, $sql_Address);
            } else {
                // Insert new address
                $sql_Address = "INSERT INTO address (First_Line, Second_Line, City) VALUES ('$addressL1', '$addressL2', '$city');";
                $res_Address = mysqli_query($dbconn, $sql_Address); 

                // Get the last inserted address ID
                $address_id = mysqli_insert_id($dbconn);

                // Link the new address to the customer
                $sql_Customer_Address = "INSERT INTO reg_customer_address (Customer_ID, Address_ID) VALUES ('$id', '$address_id');";
                $res_Customer_Address = mysqli_query($dbconn, $sql_Customer_Address);
            }

            $sql_Reg_User = "UPDATE registered_customer SET 
                                    First_Name = '$fName', 
                                    Last_Name = '$lName', 
                                    Email = '$email' 
                                    WHERE Customer_ID = '$id';";

            $res_Reg_User = mysqli_query($dbconn, $sql_Reg_User);


            if ($res_Reg_User && $res_Address) {
 
                $_SESSION['user-update-success-messages'] = true;
                header('location:admin-dashboard.php'); 
                exit();
            } else {

                $_SESSION['update-fail'] = true; 
                header('location:user-update-sanila.php?id=' . $id); 
                exit();
            }

         }



          //add employee through admin
          if(isset($_POST['add-employee'])){

            $role = $_POST["role"];
            $fName = $_POST["first-name"];
            $lName = $_POST["last-name"];
            $email = $_POST["email"];
            $dob = $_POST["dob"];
           

            $errors = array();

            $sql = "SELECT * FROM employees WHERE Email = '$email'";
            $res = mysqli_query($dbconn, $sql);
            $rowCount = mysqli_num_rows($res);

            if ($rowCount > 0) {
                array_push($errors, "Email already exists!");
            }

            if (count($errors) > 0) {
                $_SESSION['employee-add-error-messages'] = $errors;
                header('location:employee-insert-sanila.php'); 
                exit();
            }

            

            $sql = "INSERT INTO employees (Role, First_Name, Last_Name, Email, DOB) VALUES ('$role', '$fName', '$lName', '$email', '$dob');"; 
            $res = mysqli_query($dbconn, $sql); 

            

            if ($res) {
 
                $_SESSION['employee-add-success-messages'] = true;
                header('location:admin-dashboard.php'); 
                exit();
            } else {

                $_SESSION['insert-fail'] = true;  
                header('location:employee-insert-sanila.php'); 
                exit();
            }
         }


        //employee update through admin

        if(isset($_POST['edit-employee'])){
            $id = $_POST["id"];
            $role = $_POST["role"];
            $fName = $_POST["first-name"];
            $lName = $_POST["last-name"];
            $email = $_POST["email"];
            $dob = $_POST["dob"];

            $errors = array();

            $sql = "SELECT * FROM employees WHERE Email = '$email' AND Employee_ID != '$id'";
            $res = mysqli_query($dbconn, $sql);
            $rowCount = mysqli_num_rows($res);

            if ($rowCount > 0) {
                array_push($errors, "Email already exists!");
            }

            if (count($errors) > 0) {
                $_SESSION['employee-update-error-messages'] = $errors;
                header('location:employee-update-sanila.php?id=' . $id); 
                exit();
            }


            $sql = "UPDATE employees SET 
                                    Role = '$role', 
                                    First_Name = '$fName', 
                                    Last_Name = '$lName', 
                                    Email = '$email', 
                                    DOB = '$dob' 
                                    WHERE Employee_ID = '$id';"; 

            $res = mysqli_query($dbconn, $sql);


            if ($res) {

                $_SESSION['employee-update-success-messages'] = true;
                header('location:admin-dashboard.php'); 
                exit();
            } else {

                $_SESSION['update-fail'] = true; 
                header('location:employee-update-sanila.php?id=' . $id); 
                exit();
            }

        }

        //order status update through admin

        if(isset($_POST['update-order-status'])){
            $id = $_POST["id"];
            $status = $_POST["order-status"];


            $sql = "UPDATE customer_order SET 
                                    Order_Status = '$status'
                                    WHERE Order_id = '$id';"; 

            $res = mysqli_query($dbconn, $sql);


            if ($res) {

                $_SESSION['order-update-success-messages'] = true;
                header('location:admin-dashboard.php'); 
                exit();
            } else {

                $_SESSION['update-fail'] = true; 
                header('location:order-update-sanila.php?id=' . $id); 
                exit();
            }

        }


        
        //add service through admin
          if(isset($_POST['add-service'])){

            $name = $_POST["name"];
            $description = $_POST["description"];
            $price = $_POST["price"];
            $imagepath = $_POST["img-path"];
            

            $sql = "INSERT INTO services 
                        (Service_Name, Description, Price, Image_Path) 
                    VALUES 
                        ('$name', '$description', '$price', '$imagepath');"; 
            $res = mysqli_query($dbconn, $sql); 

            

            if ($res) {
 
                $_SESSION['service-add-success-messages'] = true;
                header('location:admin-dashboard.php'); 
                exit();
            } else {

                $_SESSION['insert-fail'] = true;  
                header('location:employee-insert-sanila.php'); 
                exit();
            }
         }

        //update servics through admin

    if(isset($_POST['edit-service'])){
        $id = $_POST["id"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $price = $_POST["price"];
        $imagepath = $_POST["img-path"];


        $sql = "UPDATE services SET 
                                Service_Name = '$name',
                                Description = '$description',
                                Price = '$price',
                                Image_Path = '$imagepath'
                                WHERE Service_ID = '$id';"; 

        $res = mysqli_query($dbconn, $sql);


        if ($res) {

            $_SESSION['service-update-success-messages'] = true;
            header('location:admin-dashboard.php'); 
            exit();
        } else {

            $_SESSION['update-fail'] = true; 
            header('location:order-update-sanila.php?id=' . $id); 
            exit();
        }

    }


    ?>