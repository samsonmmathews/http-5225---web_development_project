<?php
    session_start();
    if (!isset($_SESSION['user_id'])) 
    {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container my-2">
        <h1 class="text-center text-primary mb-4">Users</h1>
        <?php include('nav.php'); ?>
        <hr>
        <div class="mb-3">
            <a href="adduser.php" class="btn btn-success">Add New User</a>
        </div>
        <div class="row">
            <?php
            require('connect.php');
            $query = "SELECT * FROM users";
            $users = mysqli_query($connect, $query);

            foreach ($users as $user)
            {
                echo '<div class="col-md-4 mt-2">
                        <div class="card p-2">
                            <div class="card-body">
                                <h5 class="card-title">' . $user['name'] . '</h5>
                                <p class="card-text">Email: ' . $user['email'] . '</p>';
                                if ($user['image'])
                                {
                                    echo '<img src="' . $user['image'] . '" class="img-fluid mb-2" style="max-height:100px;">';
                                }
                                echo '<div class="d-flex justify-content-between">
                            <form action="edituser.php" method="GET">
                                <input type="hidden" name="id" value="' . $user['id'] . '">
                                <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                            </form>
                            <form action="deleteuser.php" method="POST" onsubmit="return confirm(\'Are you sure?\')">
                                <input type="hidden" name="id" value="' . $user['id'] . '">
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</body>
</html>