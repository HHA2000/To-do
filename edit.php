<?php
    require_once "DB.php";

    if ($_GET) {
        $db = new DB();
        $result = $db->edit($_GET["id"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New</title>
    <link rel="stylesheet" href="../bootstrap-4.5.0-dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Update</h1>
        <form action="update.php" method="post" class="mt-3">
            <?php if ($result): ?>
            <input hidden name="id" value="<?php echo $result->id ?>">
            <div class="form-group">
              <input type="text" class="form-control" name="title" placeholder="Title" value="<?php echo $result->title  ?>">
            </div>

            <div class="form-group">
                <textarea class="form-control" rows="5" name="description" placeholder="Description"><?php echo $result->description ?></textarea>
            </div> 

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update">
                <a href="index.php" class="btn btn-warning">Back</a>
            </div>
            <?php endif ?>
        </form>
    </div>
</body>
</html>