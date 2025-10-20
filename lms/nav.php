<?php
    if (session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }
?>

<nav class="mb-3">
    <div>
        <a href="index.php" class="btn btn-primary btn-sm">Home</a>
        
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="addschool.php" class="btn btn-primary btn-sm">Add School</a>
            <a href="users.php" class="btn btn-secondary btn-sm">Users</a>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout (<?php echo $_SESSION['user_name']; ?>)</a>
        <?php else: ?>
            <a href="login.php" class="btn btn-success btn-sm">Login</a>
            <a href="register.php" class="btn btn-secondary btn-sm">Register</a>
        <?php endif; ?>
    </div>
</nav>