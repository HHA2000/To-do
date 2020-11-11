<?php
    require_once "DB.php";

    if($_POST){
        $title = $_POST["title"];
        $description = $_POST["description"];

        $db = new DB();
        $db->store($title, $description);
    } 
?>