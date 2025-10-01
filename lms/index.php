<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Schools</title>
</head>
<body>
    <h1>Schools</h1>
    <hr>
    <div>
        <?php
            $connect = mysqli_connect(
                'localhost',
                'root', 
                '', // password
                'schools' // database name
            );

            if (!$connect) {
                die('Connection failed: ' . mysqli_connect_error());
            }

            $query = "SELECT * FROM schools";
            $schools = mysqli_query($connect, $query);

            echo '<pre>' . print_r($schools) . '</pre>';
        ?>
</body>
</html>