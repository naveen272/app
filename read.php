<?php
// Check existence of id parameter before processing further
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Include config file
    require_once "config.php";

    // Prepare a select statement
    $sql = "SELECT * FROM employees WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                // Fetch result row as an associative array
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Check if "view" parameter is set and equals "image"
                if (isset($_GET['view']) && $_GET['view'] === 'image') {
                    // Check if the file is stored in the database (file_blob) or filesystem (file_path)
                    if (!empty($row['file_blob'])) {
                        // Serve the image from the database (BLOB)
                        header("Content-Type: image/jpeg");
                        echo $row['file_blob'];
                    } elseif (!empty($row['file_path'])) {
                        // Serve the image from the filesystem
                        $filePath = "documents/" . $row['file_path'];
                        if (file_exists($filePath)) {
                            // Serve the file
                            header("Content-Type: image/jpeg");
                            readfile($filePath);
                        } else {
                            // Handle the case where the file is missing
                            http_response_code(404);
                            echo "File not found.";
                        }
                    } else {
                        // Handle case where neither file_blob nor file_path is available
                        http_response_code(404);
                        echo "No image available.";
                    }
                    exit();
                }
            } else {
                // URL doesn't contain a valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
} else {
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
<div class="container">
    <h1>View Record</h1>
    <div class="form-group">
        <label>Item</label>
        <p class="form-control-static"><?php echo $row["name"]; ?></p>
    </div>
    <div class="form-group">
        <label>Date</label>
        <p class="form-control-static"><?php echo $row["date"]; ?></p>
    </div>
    <div class="form-group">
        <label>Amount</label>
        <p class="form-control-static"><?php echo $row["amount"]; ?></p>
    </div>
    <div class="form-group">
        <label>Image</label>
        <img src="read.php?id=<?php echo $row['id']; ?>&view=image" alt="Uploaded Image" style="max-width: 100%; height: auto;">
    </div>
    <p><a href="welcome.php" class="btn btn-primary">Back</a></p>
</div>
</body>
</html>
