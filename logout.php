<?php
session_start();

unset($_SESSION['logged_in_user']);
unset($_SESSION['user_role']);

session_destroy();

header('location:homepage.php');
exit();
?>