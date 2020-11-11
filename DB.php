<?php
    class DB
    {
        private $pdo;
        public function __construct() {
            try {
                $pdo = new PDO("mysql:host=localhost;dbname=todo", "root", "admin123");
                $this->pdo = $pdo;
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                var_dump($e);
                die();
            }
        }

        public function index() {
            $statement = $this->pdo->prepare("SELECT * FROM todo");

            if($statement->execute()) {
                for($count = 0; $count < $statement->columnCount(); $count++) {
                    $column_meta = $statement->getColumnMeta($count);
                    $column_names[] = $column_meta['name'];
                }

                $datum = $statement->fetchall(PDO::FETCH_CLASS);

                return [$column_names, $datum];
            }
        }

        public function edit($id) {
            $statement = $this->pdo->prepare("SELECT * FROM todo WHERE id = :id");
            $statement->bindParam(":id", $id);

            if ($statement->execute()) {
                $result = $statement->fetch(PDO::FETCH_OBJ);
                return $result;
            }
        }

        public function delete($id) {
            $statement = $this->pdo->prepare("DELETE FROM todo WHERE id = :id");
            $statement->bindParam(":id", $id);

            if ($statement->execute()) {
                header("location:index.php");
            }
        }

        public function update($id, $title, $description) {
            $statement = $this->pdo->prepare("UPDATE `todo` 
            SET `title` = :title, `description` = :description 
            WHERE id = :id");

            $statement->bindParam(":id", $id);
            $statement->bindParam(":title", $title);
            $statement->bindParam(":description", $description);

            if($statement->execute()) {
                header("location:index.php");
            }
        }

        public function store($title, $description) {
            $statement = $this->pdo->prepare("INSERT INTO `todo` (`title`, `description`) 
            VALUE(:title, :description)");

            $statement->bindParam(":title", $title);
            $statement->bindParam(":description", $description);

            if($statement->execute()) {
                header("location:index.php");
            }
        }
    }
?>