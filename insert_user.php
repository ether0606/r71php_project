<?php

require_once "crud/crud_class.php";
$crud = new crud_class();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Enter your name"><br>

        <label for="email">Email:</label>
        <input type="text" name="email" placeholder="Enter your email"><br>

        <label for="contact_no">Contact Number:</label>
        <input type="text" name="contact_no" placeholder="Enter your contact number"><br>

        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter your password"><br>

        <input type="submit" value="Submit">
    </form>
    <?php
        if($_POST){
            $_POST['password'] = sha1($_POST['password']);
            $rs=$crud->common_insert("users", $_POST);
            if($rs && $rs['status']){
                echo "New record created successfully";
                header("Location: users_list.php");
            } else {
                echo "Error: " . $rs['message'];
            }
        }
    ?>
</body>
</html>