<?php
    require_once "config.php";

    if($_POST){
        $title = $_POST["title"];
        $description = $_POST["description"];

        $statement = $pdo->prepare("INSERT INTO `todo` (`title`, `description`) 
        VALUE(:title, :description)");

        $statement->bindParam(":title", $title);
        $statement->bindParam(":description", $description);

        if($statement->execute()) {
            header("location:index.php");
        }
    } 
?>