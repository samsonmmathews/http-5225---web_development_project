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
    <title>Update School</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-2">
        <h1 class="text-center text-success mb-4">Update School</h1>
        <div>
            <?php include('nav.php'); ?>
        </div>
        <hr>
        <div>

        <?php
            require('connect.php');

            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = "SELECT * FROM schools WHERE id=$id";
                $result = mysqli_query($connect, $query);
                $school = $result->fetch_assoc();
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // print_r($POST);
                $id = $_POST['id'];
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

                $query = "UPDATE schools SET `Board Name`='$boardName', `School Name`='$schoolName', `School Number`='$schoolNumber', `School Level`='$schoolLevel', `School Language`='$schoolLanguage', `School Type`='$schoolType', `School Special Conditions`='$schoolSpecialConditions', `Street`='$street', `City`='$city', `Province`='$province', `Postal Code`='$postalCode', `Phone`='$phone', `Fax`='$fax', `Grade Range`='$gradeRange', `Email`='$email', `Date Open`='$dateOpen', `Website`='$website', `Board Website`='$boardWebsite' WHERE id=$id";

                $result = mysqli_query($connect, $query);

                if($result) {
                    header('Location: index.php');
                }
                else {
                    echo 'FAILED, error code is' . mysqli_error($connect);
                }
            }
        ?>
            <div class="card shadow p-4">
                <form action="updateschool.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $school['id'] ?>">
                    <input type="text" name="boardName" placeHolder="Board Name" value="<?php echo $school['Board Name'] ?>">
                    <!-- <br> -->
                    <input type="text" name="schoolName" placeHolder="School Name" value="<?php echo $school['School Name'] ?>">
                    <!-- <br> -->
                    <input type="number" name="schoolNumber" placeHolder="School Number" value="<?php echo $school['School Number'] ?>">
                    <!-- <br> -->
                    <input type="text" name="schoolLevel" placeholder="School Level" value="<?php echo $school['School Level'] ?>">
                    <!-- <br> -->
                    <input type="text" name="schoolLanguage" placeholder="School Language" value="<?php echo $school['School Language'] ?>">
                    <!-- <br> -->
                    <input type="text" name="schoolType" placeholder="School Type" value="<?php echo $school['School Type'] ?>">
                    <!-- <br> -->
                    <input type="text" name="schoolSpecialConditions" placeholder="School Special Conditions" value="<?php echo $school['School Special Conditions'] ?>">
                    <!-- <br> -->
                    <input type="text" name="street" placeholder="Street" value="<?php echo $school['Street'] ?>">
                    <!-- <br> -->
                    <input type="text" name="city" placeholder="City" value="<?php echo $school['City'] ?>">
                    <!-- <br> -->
                    <input type="text" name="province" placeholder="Province" value="<?php echo $school['Province'] ?>">
                    <!-- <br> -->
                    <input type="text" name="postalCode" placeholder="Postal Code" value="<?php echo $school['Postal Code'] ?>">
                    <!-- <br> -->
                    <input type="text" name="phone" placeholder="Phone" value="<?php echo $school['Phone'] ?>">
                    <!-- <br> -->
                    <input type="text" name="fax" placeholder="Fax" value="<?php echo $school['Fax'] ?>">
                    <!-- <br> -->
                    <input type="text" name="gradeRange" placeholder="Grade Range" value="<?php echo $school['Grade Range'] ?>">
                    <!-- <br> -->
                    <input type="text" name="email" placeholder="Email" value="<?php echo $school['Email'] ?>">
                    <!-- <br> -->
                    <input type="text" name="dateOpen" placeholder="Date Open" value="<?php echo $school['Date Open'] ?>">
                    <!-- <br> -->
                    <input type="text" name="website" placeholder="Website" value="<?php echo $school['Website'] ?>">
                    <!-- <br> -->
                    <input type="text" name="boardWebsite" placeholder="Board Website" value="<?php echo $school['Board Website'] ?>">
                    <br>
                    <br>
                    <div>
                        <input type="submit" name="updateSchool" class="btn btn-success" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>