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
    <title>Add School</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-2">
        <h1 class="text-center text-success mb-4">Add School</h1>
        <div>
            <?php include('nav.php'); ?>
        </div>
        <hr>
        <div>

        <?php
            require('connect.php');
            
            if(isset($_POST['addSchool'])) {
                // print_r($POST);
                $boardName = $_POST['boardName'];
                $schoolName = $_POST['schoolName'];
                $schoolNumber = $_POST['schoolNumber'];
                $schoolLevel = $_POST['schoolLevel'];
                $schoolLanguage = $_POST['schoolLanguage'];
                $schoolType = $_POST['schoolType'];
                $schoolSpecialConditions = $_POST['schoolSpecialConditions'];
                $street = $_POST['street'];
                $city = $_POST['city'];
                $province = $_POST['province'];
                $postalCode = $_POST['postalCode'];
                $phone = $_POST['phone'];
                $fax = $_POST['fax'];
                $gradeRange = $_POST['gradeRange'];
                $email = $_POST['email'];
                $dateOpen = $_POST['dateOpen'];
                $website = $_POST['website'];
                $boardWebsite = $_POST['boardWebsite'];

                $query = "INSERT INTO schools (`Board Name`, `School Name`, `School Number`, `School Level`, `School Language`, `School Type`, `School Special Conditions`, `Street`, `City`, `Province`, `Postal Code`, `Phone`, `Fax`, `Grade Range`, `Email`, `Date Open`, `Website`, `Board Website`) VALUES ('$boardName', '$schoolName', '$schoolNumber', '$schoolLevel', '$schoolLanguage', '$schoolType', '$schoolSpecialConditions', '$street', '$city', '$province', '$postalCode', '$phone', '$fax', '$gradeRange', '$email', '$dateOpen', '$website', '$boardWebsite')";

            $school = mysqli_query($connect, $query);
            
            if($school) {
                header('Location: index.php');
            }
            else {
                echo 'FAILED, error code is' . mysqli_error($connect);
            }
        }
        ?>
            <div class="card shadow p-4">
                <form action="addschool.php" method="POST">
                    <input type="text" name="boardName" placeHolder="Board Name">
                    <!-- <br> -->
                    <input type="text" name="schoolName" placeHolder="School Name">
                    <!-- <br> -->
                    <input type="number" name="schoolNumber" placeHolder="School Number">
                    <!-- <br> -->
                    <input type="text" name="schoolLevel" placeholder="School Level">
                    <!-- <br> -->
                    <input type="text" name="schoolLanguage" placeholder="School Language">
                    <!-- <br> -->
                    <input type="text" name="schoolType" placeholder="School Type">
                    <!-- <br> -->
                    <input type="text" name="schoolSpecialConditions" placeholder="School Special Conditions">
                    <!-- <br> -->
                    <input type="text" name="street" placeholder="Street">
                    <!-- <br> -->
                    <input type="text" name="city" placeholder="City">
                    <!-- <br> -->
                    <input type="text" name="province" placeholder="Province">
                    <!-- <br> -->
                    <input type="text" name="postalCode" placeholder="Postal Code">
                    <!-- <br> -->
                    <input type="text" name="phone" placeholder="Phone">
                    <!-- <br> -->
                    <input type="text" name="fax" placeholder="Fax">
                    <!-- <br> -->
                    <input type="text" name="gradeRange" placeholder="Grade Range">
                    <!-- <br> -->
                    <input type="text" name="email" placeholder="Email">
                    <!-- <br> -->
                    <input type="text" name="dateOpen" placeholder="Date Open">
                    <!-- <br> -->
                    <input type="text" name="website" placeholder="Website">
                    <!-- <br> -->
                    <input type="text" name="boardWebsite" placeholder="Board Website">
                    <br>
                    <br>
                    <div>
                        <input type="submit" name="addSchool" class="btn btn-success" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>