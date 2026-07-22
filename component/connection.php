<?php
    session_start();
    $base_url = "http://localhost/r71php_project/";
    require_once  ($_SERVER['DOCUMENT_ROOT'] . "/r71php_project/crud/crud_class.php");
    $crud = new crud_class();
?>