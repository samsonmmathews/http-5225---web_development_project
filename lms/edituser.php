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
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2>Edit User</h2>
    <?php 
        include('nav.php'); 

        require('connect.php');

        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = mysqli_query($connect, "SELECT * FROM users WHERE id=$id");
            $user = $result->fetch_assoc();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null;
            $imagePath = $user['image'];

            if (!empty($_FILES['image']['name'])) {
                $targetDir = "uploads/";
                if (!is_dir($targetDir)) mkdir($targetDir);
                $fileName = time() . "_" . basename($_FILES["image"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
                $imagePath = $targetFilePath;
            }

            if ($password) {
                $query = "UPDATE users SET `name`='$name', `email`='$email', `password`='$password', `image`='$imagePath' WHERE id=$id";
                $result = mysqli_query($connect, $query);
            } else
            {
                $query = $connect->prepare("UPDATE users SET `name`='$name', `email`='$email', `image`='$imagePath' WHERE id=$id");
                $result = mysqli_query($connect, $query);
            }

            if ($result) {
                header("Location: users.php");
                exit();
            } else {
                echo "Failed: " . $connect->error;
            }
        }
    ?>

    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <input class="form-control mb-2" type="text" name="name" placeholder="Name" value="<?= $user['name'] ?>" required>
        <input class="form-control mb-2" type="email" name="email" placeholder="Email" value="<?= $user['email'] ?>" required>
        <input class="form-control mb-2" type="password" name="password" placeholder="New Password">
        <input class="form-control mb-2" type="file" name="image">
        <?php if ($user['image']): ?>
            <img src="<?= $user['image'] ?>" class="img-fluid mb-2" style="max-height:100px;">
        <?php endif; ?>
        <button class="btn btn-primary" type="submit">Update User</button>
    </form>
    
</body>
</html>