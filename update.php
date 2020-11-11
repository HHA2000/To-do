<?php 
    require_once "DB.php";

    if ($_POST) {
        $id = $_POST["id"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        
        $db = new DB();
        $db->update($id, $title, $description);
    }
?>