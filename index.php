<?php
    require_once "config.php";

    $statement = $pdo->prepare("SELECT * FROM todo");

    if($statement->execute()) {
        for($count = 0; $count < $statement->columnCount(); $count++) {
            $column_meta = $statement->getColumnMeta($count);
            $column_names[] = $column_meta['name'];
        }

        $datum = $statement->fetchall(PDO::FETCH_CLASS);
    }
?>
<!DOCTYPE html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do</title>
    <link rel="stylesheet" href="../bootstrap-4.5.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <a href="create.html" class="btn btn-success sign">+</a>
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <?php foreach ($column_names as $column_name) {
                                echo "<th>$column_name</th>";
                            } ?>   
                            <th>Action</th>
                        </tr>
                    </thead>
    
                    <tbody>
                    <?php if($datum):?>
                    <?php foreach ($datum as $data) : ?>
                        <tr>
                            <td><?php echo $data->id ?></td>
                            <td><?php echo $data->title ?></td>
                            <td><?php echo $data->description ?></td>
                            <td><?php echo date("Y-m-d", strtotime($data->create_at)) ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $data->id ?>" class="btn btn-outline-primary">Edit</a>
                                <a href="delete.php?id=<?php echo $data->id ?>" class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>