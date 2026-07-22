<?php

require_once "../component/connection.php";

$id = $_GET['id'];

// Fetch the user details based on the ID
$rs = $crud->common_delete("users", ["id" => $id]);
if($rs && $rs['status']){
    header("Location: users_list.php");
} else {
    echo "Error: " . $rs['message'];
}

?>
