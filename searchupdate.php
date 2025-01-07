<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$name = $date = $amount = "";
$name_err = $date_err = $amount_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])) {
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z,\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate date
    $input_date = trim($_POST["date"]);
    if(empty($input_date)){
        $date_err = "Please enter a date.";     
    } else{
        $date = $input_date;
    }
    
    // Validate amount
    $input_amount = trim($_POST["amount"]);
    if(empty($input_amount)){
        $amount_err = "Please enter the amount.";     
    } elseif(!ctype_digit($input_amount)){
        $amount_err = "Please enter a positive integer value.";
    } else{
        $amount = $input_amount;
    }

    // File upload (get binary content of the uploaded file)
    $fileContent = null;
    if (isset($_FILES["uploadfile"]) && $_FILES["uploadfile"]["error"] === UPLOAD_ERR_OK) {
        $fileContent = file_get_contents($_FILES["uploadfile"]["tmp_name"]);
    } else {
        die("Error: File upload failed.");
    }

    // Check input errors before inserting into the database
    if(empty($name_err) && empty($date_err) && empty($amount_err)) {
        // Prepare an update statement to replace the existing image
        $sql = "UPDATE employees SET name=?, date=?, amount=?, file_blob=? WHERE id=?";
        
        if($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssi", $param_name, $param_date, $param_amount, $param_fileBlob, $param_id);

            // Set parameters
            $param_name = $name;
            $param_date = $date;
            $param_amount = $amount;
            $param_fileBlob = $fileContent;  // Save image binary data in the database
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)) {
                // Successfully updated, redirect to the landing page
                header("location: info.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            die('MySQL prepare failed: ' . mysqli_error($link));
        }
    }

    // Close connection
    mysqli_close($link);
} else {
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM employees WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1) {
                    // Fetch the result as an associative array
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $name = $row["name"];
                    $date = $row["date"];
                    $amount = $row["amount"];
                } else {
                    // URL doesn't contain valid id. Redirect to error page
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
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
     .container {
    padding-right: 10px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
body {
    margin: 21px;
    padding-left: 10px;
    }
    </style>
</head>
<body>
<div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <div class="col-md-10">
                     <div class="col-md-16">
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Item</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
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
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="info.php" class="btn btn-primary">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>