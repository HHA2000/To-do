<?php 
    require_once "config.php";

    $id = $_POST["id"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    
    $statement = $pdo->prepare("UPDATE `todo` 
    SET `title` = :title, `description` = :description 
    WHERE id = :id");

    $statement->bindParam(":id", $id);
    $statement->bindParam(":title", $title);
    $statement->bindParam(":description", $description);

    if($statement->execute()) {
        header("location:index.php");
    }
    
?>