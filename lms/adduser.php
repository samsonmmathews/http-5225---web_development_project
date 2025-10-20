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
    <title>Add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2>Add User</h2>
    <?php include('nav.php'); ?>
    <form method="POST" enctype="multipart/form-data">
        <input class="form-control mb-2" type="text" name="name" placeholder="Name" required>
        <input class="form-control mb-2" type="email" name="email" placeholder="Email" required>
        <input class="form-control mb-2" type="password" name="password" placeholder="Password" required>
        <input class="form-control mb-2" type="file" name="image">
        <button class="btn btn-success" type="submit" name="addUser">Add User</button>
    </form>

    <?php
        require('connect.php');

        if (isset($_POST['addUser'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $imagePath = null;

            if (!empty($_FILES['image']['name'])) {
                $targetDir = "uploads/";
                if (!is_dir($targetDir)) 
                    mkdir($targetDir);
                $fileName = time() . "_" . basename($_FILES["image"]["name"]);
                $targetFilePath = $targetDir . $fileName;
                move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
                $imagePath = $targetFilePath;
            }

            $query = "INSERT INTO users (name, email, password, image) VALUES ('$name', '$email', '$password', '$imagePath')";
            $result = mysqli_query($connect, $query);
            if ($query)
            {
                header("Location: users.php");
                echo "User added successfully.";
                exit();
            }
            else
            {
                echo "Failed: " . $connect->error;
            }
        }
    ?>
</body>
</html>