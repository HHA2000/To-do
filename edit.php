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
        <form action="" method="post" class="mt-3">
            <div class="form-group">
              <input type="text" class="form-control" name="title" placeholder="Title">
            </div>

            <div class="form-group">
                <textarea class="form-control" rows="5" name="description" placeholder="Description"></textarea>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update">
                <a href="index.php" class="btn btn-warning">Back</a>
            </div>
        </form>
    </div>
</body>
</html>