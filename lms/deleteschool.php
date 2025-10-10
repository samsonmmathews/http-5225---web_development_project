<?php
        require('connect.php');
        
        if(isset($_POST['id'])) {
            // print_r($POST);
            $id = $_POST['id'];

            $query = "DELETE FROM schools WHERE id=$id";

        $school = mysqli_query($connect, $query);
        
        if($school) {
            header('Location: index.php');
        }
        else {
            echo 'FAILED, error code is' . mysqli_error($connect);
        }
    }
    ?>