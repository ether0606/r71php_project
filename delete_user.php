<?php

require_once "crud/crud_class.php";
$crud = new crud_class();
$id = $_GET['id'];

// Fetch the user details based on the ID
$rs = $crud->common_delete("users", ["id" => $id]);
if($rs && $rs['status']){
    header("Location: users_list.php");
} else {
    echo "Error: " . $rs['message'];
}
?>
