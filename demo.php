<?php
session_start();
if(!isset($_SESSION["sname"])){
    header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple Image Upload and Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Added CSS for image size */
        .img-thumbnail {
            width: 400px;
            height: 200px;
        }
        .logout-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
    </style>
</head>
<body class="bg-light">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="#" method="post" enctype="multipart/form-data" class="bg-white p-4 rounded shadow">
                <div class="mb-3">
                    <label for="fileInput" class="form-label"><b>Select Images:</b></label>
                    <input type="file" name="files[]" id="fileInput" class="form-control" multiple required>
                </div>
                <div class="mb-2">
                    <input type="submit" name="btnSubmit" value="Upload" class="btn btn-success">
                </div>
            </form>

            <?php
            if (isset($_POST["btnSubmit"])) {
                $uploadDir = "uploads/";
                if (!file_exists($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $totalFiles = count($_FILES['files']['name']);

                echo "<table class='table table-bordered table-striped mt-4'>
                        <thead>
                            <tr>
                                <th>File Name</th>
                                <th>File Type</th>
                                <th>File Size</th>
                                <th>Preview</th>
                            </tr>
                        </thead>
                        <tbody>";

                for ($i = 0; $i < $totalFiles; $i++) {
                    $file_name = $_FILES['files']['name'][$i];
                    $file_type = $_FILES['files']['type'][$i];
                    $file_size = $_FILES['files']['size'][$i];

                    $targetFilePath = $uploadDir . $file_name;
                    move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFilePath);

                    echo "<tr>
                            <td>$file_name</td>
                            <td>$file_type</td>
                            <td>$file_size</td>
                            <td><img src='$targetFilePath' alt='Preview' class='img-thumbnail' ></td>
                          </tr>";
                }

                echo "</tbody></table>";
            }
            ?>

            <a href="uploads/" class="btn btn-primary mt-3">Check Upload</a>
            <a href="logout.php" class="btn btn-primary logout-btn">Logout</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
