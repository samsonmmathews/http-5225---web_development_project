<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update School</title>
</head>
<body>
    <h1>Update School</h1>
    <div>
        <?php include('nav.php'); ?>
    </div>
    <hr>
    <div>

    <?php
        require('connect.php');

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = $_GET['id'];
            $query = "SELECT * FROM schools WHERE id = " . $id;
            $result = mysqli_query($connect, $query);
            $school = $result -> fetch_assoc();
        }

        if(isset($_POST['updateSchool'])) {
            // print_r($POST);
            $id = $_POST['id'];
            $boardName = $_POST['boardName'];
            $schoolName = $_POST['schoolName'];
            $schoolNumber = $_POST['schoolNumber'];
            $schoolLevel = $_POST['schoolLevel'];

            $query = "UPDATE schools SET `Board Name`='$boardName', `School Name`='$schoolName', `School Number`='$schoolNumber', `School Level`='$schoolLevel' WHERE id=$id";

        $school = mysqli_query($connect, $query);

        if($school) {
            header('Location: index.php');
        }
        else {
            echo 'FAILED, error code is' . mysqli_error($connect);
        }
    }
    ?>
        <form action="updateschool.php" method="POST">
            <input type="text" name="boardName" placeHolder="Board Name" value="<?php echo $school['Board Name'] ?>">
            <br>
            <input type="text" name="schoolName" placeHolder="School Name" value="<?php echo $school['School Name'] ?>">
            <br>
            <input type="number" name="schoolNumber" placeHolder="School Number" value="<?php echo $school['School Number'] ?>">
            <br>
            <input type="text" name="schoolLevel" placeholder="School Level" value="<?php echo $school['School Level'] ?>">
            <input type="submit" name="updateSchool" value="Update">
        </form>
    </div>
</body>
</html>