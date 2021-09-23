<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
.container{
    padding: 2px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid;
    color: #333;
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
body {
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    font-size: 11px;
    line-height: 1.42857143;
    color: #333;
    background-color: #fff;
}
        body{ font: 12px ; text-align: center; }
        .form-control{
        }
</style>
</head>
<body>
<div class="bg-img">
<div class="container">
             <div class="col-lg-12">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> Welcome.</h1><?php $today = date("d/m/Y"); echo $today; ?>
<form method="post">
<label>Search</label>
<input class="btn btn-default" type="date" class='dateFilter' name="search">
<input class="btn btn-success" type="submit" name="submit">
<a href="welcome.php" class="btn btn-danger">Cancel</a>
</form>
                    <?php
                    // Include config file
                    require_once "config.php";
                    if (isset($_POST["submit"])) {
                    $str = $_POST["search"];
                    //$sql = mysqli_query($link,"SELECT * from employees WHERE date = '$str';");
                    if($_SESSION["role"] == "admin"){
                        $sql = mysqli_query($link,"SELECT * from employees WHERE date = '$str';");
                    } else{
                        $sql = mysqli_query($link,"SELECT * FROM employees where uname='".$_SESSION["username"]."'  and date = '$str';");
                        if(mysqli_num_rows($sql) > 0){
                            echo "<table border='3' color: #070708 class=' table table-striped'>";
                                     echo "<thead>";
                                        echo "<th>S.No</th>";
                                        echo "<th>Item</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>Amount</th>";
                                        echo "<th>Created By</th>";
                                        //echo "<th>Document</th>";
                                        echo "</thead>";
                                echo "<tbody>";
                                $i=1;
                                while($row = mysqli_fetch_array($sql)){
                                    echo "<tr>";
                                        echo "<td>"  . $i . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>" . $row['amount'] . "</td>";
                                        echo "<td>" . $row['uname'] . "</td>";
                                        /*echo "<td>" . $row['file_path']."</td>";
										if($row['file_path'] != ''){
											echo "<td><a href='documents/".$row['file_path']."'>view</a></td>";
										} else{
											echo "<td></td>";
										}*/
                                         echo "</tr>";
                                         $i++;
                                     }
                                echo "</tbody>";                            
                            echo "</table>";
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } 
                }
            // Close connection
            mysqli_close($link);                
        ?>
       </div>
     </div>
   </div>
</body>
</html>