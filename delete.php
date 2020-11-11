<?php
    require_once "DB.php";

    if ($_GET) {
        $db = new DB();
        $db->delete($_GET['id']);
    }
?>