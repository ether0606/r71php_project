<?php

require_once "crud/crud_class.php";
$crud = new crud_class();
$id = $_GET['id'];

// Fetch the user details based on the ID
$rs = $crud->common_select("users", "*", ["id" => $id]);
if($rs && $rs['status']){
    $user = $rs['data'][0];
}
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
        <input type="text" name="name" value="<?= $user->name ?>" placeholder="Enter your name"><br>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?= $user->email ?>" placeholder="Enter your email"><br>

        <label for="contact_no">Contact Number:</label>
        <input type="text" name="contact_no" value="<?= $user->contact_no ?>" placeholder="Enter your contact number"><br>

        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Enter your password"><br>

        <input type="submit" value="Submit">
    </form>
    <?php
        if($_POST){
           
        
            if(!empty($_POST['password'])){
                $_POST['password'] = sha1($_POST['password']);
            } else {
                // If password is not provided, keep the existing password
                $_POST['password'] = $user->password;
            }
            
            $rs = $crud->common_update("users", $_POST, ["id" => $id]);
            if($rs && $rs['status']){
                header("Location: users_list.php");
            } else {
                echo "Error: " . $rs['message'];
            }
        }
    ?>
</body>
</html>