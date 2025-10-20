<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container my-5">
    <h2 class="mb-4">Login</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
        <input class="form-control mb-2" type="email" name="email" placeholder="Email" required>
        <input class="form-control mb-3" type="password" name="password" placeholder="Password" required>
        <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
    </form>

    <a href="register.php" class="btn btn-link mt-3">Don’t have an account? Register</a>

    <?php
    session_start();
    require('connect.php');

    if (isset($_SESSION['user_id'])) 
    {
        header("Location: index.php");
        exit();
    }

    if (isset($_POST['login'])) 
    {
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $stmt = $connect->prepare("SELECT id, name, password, image FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) 
        {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password']))
            {
                // ✅ Login success — set session data
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_image'] = $user['image'];

                header("Location: index.php");
                exit();
            }
            else 
            {
                $error = "Invalid password. Please try again.";
            }
        }
        else 
        {
            $error = "No user found with that email.";
        }
    }
    ?>
    
</body>
</html>