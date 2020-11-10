<?php
    require_once "config.php";

    $id = $_GET['id'];

    $statement = $pdo->prepare("DELETE FROM todo WHERE id = :id");
    $statement->bindParam(":id", $id);

    if ($statement->execute()) {
        header("location:index.php");
    }
?>