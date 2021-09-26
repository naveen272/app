<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php
    // Initialize the session
            session_start();
 
                        // Check if the user is already logged in, if yes then redirect him to welcome page
                            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                                 header("location: welcome.php");
                                         exit;
                                            }
 
        // Include config file
require_once "config.php";
 
                // Define variables and initialize with empty values
                $username = $password = "";
                $username_err = $password_err = "";
 
                // Processing form data when form is submitted
            if($_SERVER["REQUEST_METHOD"] == "POST"){
 
         // Check if username is empty
         if(empty(trim($_POST["username"]))){
           $username_err = "Please enter username.";
         } else{
           $username = trim($_POST["username"]);
         }
    
         // Check if password is empty
        if(empty(trim($_POST["password"]))){
           $password_err = "Please enter your password.";
        } else{
        $password = trim($_POST["password"]);
         }
    
         // Validate credentials
         if(empty($username_err) && empty($password_err)){
         // Prepare a select statement
         $sql = "SELECT id, username, password,role FROM users WHERE username = ?";
        
         if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password,$role);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;   
                            $_SESSION["role"] = $role;                        
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Display an error message if password is not valid
                            
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}

?>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <style>
/* Add styles to the form container */
.container {
  position: absolute;
  right: 0;
  margin: 2px;
  max-width: 30px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 80%;
  padding: 10px;
  margin: 5px 0 20px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
</style>
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .page_wrap{
    width: 350px;
    height: 100px;
    margin-left: auto;
    margin-right: auto;
    {text-align: center; /* required by some browsers */ }
     }
     .bg-img {
  /* The image used */
  background-image: url("royal-enfield.jpg");

  /* Control the height of the image */
  min-height: 30%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  height: fit-content;
  /*position: middle;*/
}
    </style>
</head>
<body>
<div>
<div class="header">
  	  <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
      </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label style="color:red;">Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span style="color: red" class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label style="color:red;">Password</label>
                <input type="password" name="password" class="form-control form-control-danger">
                <span style="color: red" class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" style="color:black" class="btn btn-primary" value="Login">
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
            Reset Password <a  class="btn btn-danger">Clickhere</a>
            </form>
    </div>    
</body>

</html>
