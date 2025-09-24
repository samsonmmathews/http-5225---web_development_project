<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 5</title>
</head>
<body>
    <?php
        $connect = mysqli_connect(
            'localhost',  // Database host
            'root',       // Database username
            '',           // Database password
            'csv_db 10'       // Database name
        );
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM colors";
        $colors = mysqli_query($connect, $query);

        echo "<pre>" . print_r($colors) . "</pre>";

        foreach ($colors as $color) {
            // echo $color['Name'] . "<br>";
            echo '<div class="color" style="background-color:' . $color['Hex'] . '; width:100%; height:50px; display:flex; justify-content:center;">' . $color['Name'] . '</div>';
        }

    ?>
</body>
</html>