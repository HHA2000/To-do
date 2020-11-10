<?php
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=todo", "root", "admin123");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        var_dump($e);
        die();
    }
?>