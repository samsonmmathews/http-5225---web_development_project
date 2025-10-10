<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Schools</title>
</head>
<body>
    <h1>Schools</h1>
    <?php include('nav.php'); ?>
    <hr>
    <div>
        <?php
            
            require 'connect.php';
            
            $query = 'SELECT * FROM schools';
            $schools = mysqli_query($connect, $query);

            // echo '<pre>' . print_r($schools) . '</pre>';

            foreach ($schools as $school) {
                echo '<div class="col-md-4 mt-2 mb-2">
                    <div class="card">
                      <div class="card-body">
                        <h3 class="card-title">School Name: ' . $school['School Name'] . '</h3>
                        <h4 class="card-title">Board Name: ' . $school['Board Name'] . '</h4>
                        <p class="card-text">School Number: ' . $school['School Number'] . '</p>
                        <p class="card-text">School Level: ' . $school['School Level'] . '</p>
                        <span class="badge bg-secondary">School Language: ' . $school['School Language'] . '</span>
                        <span class="badge bg-info">, School Type: ' . $school['School Type'] . '</span>
                        <p class="card-text">School Special Conditions: ' . $school['School Special Conditions'] . '</p>
                        <span class="badge bg-secondary">Phone: ' . $school['Phone'] . '</span>
                        <span class="badge bg-info">, Email: ' . $school['Email'] . '</span>
                        <p class="card-text">Fax: ' . $school['Fax'] . '</p>
                        <p class="card-text">Address: ' . $school['Street'] . ', ' . $school['City'] . ', ' . $school['Province'] . ', ' . $school['Postal Code'] .'</p>
                        <p class="card-text">Grade Range: ' . $school['Grade Range'] . '</p>
                        <p class="card-text">Date Open: ' . $school['Date Open'] . '</p>
                        <p class="card-text">Website: ' . $school['Website'] . '</p>
                        <p class="card-text">Board Website: ' . $school['Board Website'] . '</p>
                      </div>
                      <div class="card-footer">
                        <div class="row">
                          <div class="col">
                            <form action="updateschool.php">
                              <input type="hidden" name="id" value="' . $school['id'] . '">
                              <button type="submit" name="updateSchool" class="btn btn-sm btn-primary">Update</button>
                            </form>
                          </div>
                          <div class="col text-end">
                            <form action="deleteschool.php" method="POST">
                                <input type="hidden" name="id" value="' . $school['id'] . '">
                                <button type="submit" name="deleteSchool" class="btn btn-sm btn-danger">Delete</button>
                              </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>'; 
            };
        ?>
        <style>
            .Box {
                border: 1px solid red;
            }
        </style>
        <!-- <div class="Box">
            <h3>School Name</h3>
        </div> -->
    </div>
</body>
</html>