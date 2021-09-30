<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index");
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
    <link rel="stylesheet" href="css/foundation.css" />
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
        div.gallery {
  margin: 10px;
  border: 1px solid #ccc;
  float: left;
  width: 20%;
}

div.gallery img {
  width: 100%;
  height: 100%
}

div.desc {
  padding: 15px;
  text-align: center;
}

</style>
</head>
<body>
<div class="bg-img">
<h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> Welcome.</h1><?php $today = date("d/m/Y"); echo $today; ?>  
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-26">
                        <form method="post">
                        <label>Search</label>
                        <input type="text" class="btn btn-default" id="search" name="search">
                        <input class="btn btn-success" type="submit" name="searchbtn" value="search">
                        <a href="welcome.php" class="btn btn-danger">Cancel</a>
                        </form>
                    <?php
                    // Include config file
                    require_once "config.php";
                    if(isset($_POST['searchbtn']) && $_POST['search'] !='')
					{
						$valueTosearch=$_POST['search'];
						//echo $valueTosearch;
                        if($_SESSION["role"] == "admin"){
						$sql = "SELECT * FROM employees WHERE name LIKE '%$valueTosearch%' OR 
                        amount  LIKE '%$valueTosearch%' OR uname LIKE '%$valueTosearch%' OR file_path LIKE '%$valueTosearch%' OR date LIKE '%$valueTosearch%'";
					    //echo print_r($sql);
                    }else{
						// Attempt select query execution
						$sql = "SELECT * FROM employees where uname='".$_SESSION["username"]."' 
                        and name LIKE '%$valueTosearch%' OR uname='".$_SESSION["username"]."' 
                        and amount LIKE '%$valueTosearch%' OR file_path LIKE '%$valueTosearch%' OR uname='".$_SESSION["username"]."' 
                        and date LIKE '%$valueTosearch%'";
					    //echo print_r($sql);
                    }
					if($result = mysqli_query($link, $sql)){
						if(mysqli_num_rows($result) > 0){
							echo '<table class="table table-bordered table-striped">';
								echo "<thead>";
									echo "<tr>";
										echo "<th>SrNo</th>";//SrNo auto increment
										echo "<th>Name</th>";
										echo "<th>Date</th>";
										echo "<th>Amount</th>";
                                        echo "<th>Created By</th>";
										echo "<th>Action</th>";
									echo "</tr>";
								echo "</thead>";
								echo "<tbody>";
                                $i=1;
								while($row = mysqli_fetch_array($result)){
									echo "<tr>";
										echo "<td>" . $i . "</td>";
										echo "<td>" . $row['name'] . "</td>";
										echo "<td>" . $row['date'] . "</td>";
										echo "<td>" . $row['amount'] . "</td>";
                                        echo "<td>" . $row['uname'] . "</td>";
										echo "<td>";
                                        echo "<a href='read-search.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'> <span class='glyphicon glyphicon-eye-open'></span></a>";
                                        echo "<a href='delete-search.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
										echo "</td>";
									echo "</tr>";
                                    $i++;
								}
								echo "</tbody>";                            
							echo "</table>";
							// Free result set
							mysqli_free_result($result);
						} else{
							echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
						}
					} else{
						echo "Oops! Something went wrong. Please try again later.";
					}}
					
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>