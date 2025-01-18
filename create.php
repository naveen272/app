<?php
session_start();
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $date = $amount = "";
$name_err = $date_err = $amount_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $input_name = trim($_POST["Item"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => "/^[a-zA-Z,\s]+$/"]])) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    $uname = $_SESSION["username"];

    // Validate date
    $input_date = trim($_POST["date"]);
    if (empty($input_date)) {
        $date_err = "Please enter a date.";
    } else {
        $date = $input_date;
    }

    // Validate amount
    $input_amount = trim($_POST["amount"]);
    if (empty($input_amount)) {
        $amount_err = "Please enter the amount.";
    } elseif (!ctype_digit($input_amount)) {
        $amount_err = "Please enter a positive integer value.";
    } else {
        $amount = $input_amount;
    }

    // Validate and process file upload
    // Validate and process file upload
$fileContent = null;
if (isset($_FILES["uploadfile"]) && $_FILES["uploadfile"]["error"] === UPLOAD_ERR_OK) {
    $fileContent = file_get_contents($_FILES["uploadfile"]["tmp_name"]);
} elseif ($_FILES["uploadfile"]["error"] !== UPLOAD_ERR_NO_FILE) {
    // Handle errors other than no file uploaded
    die("Error: File upload failed. Code: " . $_FILES["uploadfile"]["error"]);
}


    // Check input errors before inserting into the database
    if (empty($name_err) && empty($date_err) && empty($amount_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO employees (uname, name, date, amount, file_blob, file_path) VALUES (?, ?, ?, ?, ?, '')";


        // Check for SQL prepare error
        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_uname, $param_name, $param_date, $param_amount, $param_fileBlob);


            // Set parameters
            $param_uname = $uname;
            $param_name = $name;
            $param_date = $date;
            $param_amount = $amount;
            $param_fileBlob = $fileContent;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Records created successfully. Redirect to landing page
                header("location: welcome.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            // Output MySQL error if prepare fails
            die('MySQL prepare failed: ' . mysqli_error($link));
        }
    }
    // Close connection
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style>
  body {
    margin: 13px;
    padding-top: 100px;
} 
.btn {
    display: inline-block;
    padding: 5px 15px;
    margin-bottom: 0;
    font-size: 100%;
    font-weight: normal;
    line-height: 1.5;
    border: 1% solid transparent;
    border-radius: 150px;
}
/* Full-width input fields */
input[type=text], input[type=password] {
  width: 80%;
  padding: 10px;
  margin: 5px 0 20px 0;
  border: none;
  background-color: #f27777;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
</style>
</head>
<body>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <div class="col-md-10">
                     <div class="col-md-16">
                        <h2>Create Record</h2>
                    </div>
                         <p>Please fill this form and submit to add Items.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                         <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Item</label>
                            <input type="text" name="Item" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <label>Date</label>
                        <input type="date" name="date">
                        <div class="form-group <?php echo (!empty($amount_err)) ? 'has-error' : ''; ?>">
                            <label>Amount</label>
                            <input type="text" name="amount" class="form-control" value="<?php echo $amount; ?>">
                            <span class="help-block"><?php echo $amount_err;?></span>
                        </div>
						<div class="form-group">
							<input type="file" name="uploadfile" value="" />
						 </div>
                        <input type="submit" class="btn btn-primary" value="Submit" >
                        <a href="welcome.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div><div class="col-lg-15"></div>        
        </div>
    </div>
</body>
</html>