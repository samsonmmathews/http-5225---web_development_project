<?php
    session_start();
    if (!isset($_SESSION['user_id']))
    {
        header("Location: login.php");
        exit();
    }
    require('connect.php');

    if (isset($_POST['id']))
    {
        $id = $_POST['id'];
        $query = "DELETE FROM users WHERE id=$id";
        $result = mysqli_query($connect, $query);
        if ($query)
        {
            header("Location: users.php");
            exit();
        } 
        else
        {
            echo "Failed: " . $connect->error;
        }
    }
?>
