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
    <h1>Users List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th>Actions</th>
        </tr>

        <?php
            $rs = $crud->common_select("users", "*");
            if($rs && $rs['status']){
                foreach($rs['data'] as $row){
        ?>
            <tr>
                <td><?= $row->id ?></td>
                <td><?= $row->name ?></td>
                <td><?= $row->email ?></td>
                <td><?= $row->contact_no ?></td>
                <td>
                    <a href="edit_user.php?id=<?= $row->id ?>">Edit</a> |
                    <a onclick="return confirm('Are you sure you want to delete this user?');" href="delete_user.php?id=<?= $row->id ?>">Delete</a>
                </td>
            </tr>
        <?php
                }
            }
        ?>
    </table>

</body>
</html>