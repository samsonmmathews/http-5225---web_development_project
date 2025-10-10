<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add School</title>
</head>
<body>
    <h1>Add School</h1>
    <div>
        <?php include('nav.php'); ?>
    </div>
    <hr>
    <div>

    <?php
        require('connect.php');
        
        if(isset($_POST['addSchool'])) {
            // print_r($POST);
            $boardName=$_POST['boardName'];
            $schoolName=$_POST['schoolName'];
            $schoolNumber=$_POST['schoolNumber'];
            $schoolLevel=$_POST['schoolLevel'];

            $query = "INSERT INTO schools (`Board Name`, `School Name`, `School Number`, `School Level`) VALUES ('$boardName', '$schoolName', '$schoolNumber', '$schoolLevel')";

        $school = mysqli_query($connect, $query);
        
        if($school) {
            header('Location: index.php');
        }
        else {
            echo 'FAILED, error code is' . mysqli_error($connect);
        }
    }
    ?>
        <form action="addschool.php" method="POST">
            <input type="text" name="boardName" placeHolder="Board Name">
            <br>
            <input type="text" name="schoolName" placeHolder="School Name">
            <br>
            <input type="number" name="schoolNumber" placeHolder="School Number">
            <br>
            <input type="text" name="schoolLevel" placeholder="School Level">
            <input type="submit" name="addSchool" value="Add">
        </form>
    </div>
</body>
</html>