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
      <link rel="stylesheet" href="style.css" />
      <link rel="stylesheet" href="css/foundation.css" />
    <style type="">
.container{
    padding: .5px;
    line-height: 1.42857143;
    vertical-align: top;
    
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
.custom-btn {
    font-size: 10px; /* Increase button font size */
    padding: 2px 2px; /* Add padding */
    margin: 2px; /* Add space between buttons */
    border-radius: 4px; /* Rounded corners */
}

</style>
</head>
<body>
<nav  data-topbar role="navigation">
</nav>
<?php if(isset($_POST['submit'])) 
{ $part = $_POST['website'];
switch ($part) 
{ case "1" : header( "Location: create.php" );
break;
case "2" : header( "Location: reset-password.php" );
break;
case "4" : header( "Location: report.php" );
break;
case "5" : header( "Location: info.php" );
break;
//case "6" : header( "Location: dataupload.php" );
//break;
case "7" : header( "Location: analys.php" );
break;
case "8" : header( "Location: reports.php" );
break;
}
}
?>
<div class="container">          
<h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> Welcome.</h1><?php $today = date("d/m/Y"); echo $today; ?>  
<a class="btn btn-primary" href="logout.php">Logout</a>  
<!--<a class="btn btn-primary" href="register.php">Create User</a>-->
<?php if($_SESSION["role"] == "admin"){ 
    echo "<a href='users.php' class='btn btn-primary'>Users</a>"; 
     } ?>
</div>
<div class="bg-img">
<div class="container">
             <div class="col-lg-12">
             <section class="top-bar-section">
   <form method="post" action="">
   <select name="website">
          <li><option value="0">select</option></li>
          <li><option value="1">Add</option></li>   
          <li><option value="2">Password Reset</option></li>
          <li><option value="4">Download</option></li>
          <li><option value="5">SearchData</option></li>
          <!--<li><option value="6">Data Analysis</option></li>-->
          <li><option value="7">AnalyzeData</option></li>
          <li><option value="8">Results</option></li>
          <li></select></li>
        <input type="submit" name="submit"/>
    </form>
  </section>
        <p>
<a style="color:black;" >Total
<input style="color:black;" color: #070708 class="form-control" value="<?php
                    require_once "config.php";
					if($_SESSION["role"] == "admin"){
						$sql = mysqli_query($link,"SELECT SUM(amount) as amount FROM employees ");
					} else{
						$sql = mysqli_query($link,"SELECT SUM(amount) as amount FROM employees where uname='".$_SESSION["username"]."' ");
					}
                    $row = mysqli_fetch_array($sql);
                    echo $row['amount'];
?>"/> </a>       
</p>
<p>
<a style="color:black;" >Currnet Month Total
<input style="color:black;" color: #070708 class="form-control" value="<?php
                    require_once "config.php";
                    $startDate = date('Y-m-21', strtotime('first day of last month'));
                    $endDate = date('Y-m-20', strtotime('today'));
					if($_SESSION["role"] == "admin"){
						$sql = mysqli_query($link,"SELECT SUM(amount) as amount FROM employees ");
					} else{
					  //$sql = mysqli_query($link,"SELECT SUM(amount) as amount FROM employees where uname='".$_SESSION["username"]."' and MONTH(Date)=MONTH(now()) and YEAR(date)=YEAR(now())");
                      $sql = mysqli_query($link,"SELECT SUM(amount) as amount 
          FROM employees 
          WHERE uname='".$_SESSION["username"]."' 
          AND Date BETWEEN '$startDate' AND '$endDate'");

					}
                    $row = mysqli_fetch_array($sql);
                    echo $row['amount'];
?>"/> </a>       
</p>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    if(isset($_GET['page']))
                    {
                        $page = $_GET['page'];
                      }
                      else{
                          $page = 1;
                        }
                        $num_per_page = 50;
                        $start_from = ($page-1)*$num_per_page;

                    // Attempt select query execution
					if($_SESSION["role"] == "admin"){
						$sql = "SELECT * FROM employees limit $start_from,$num_per_page";
					} else{
					//$sql = "SELECT * FROM employees where uname='".$_SESSION["username"]."' and MONTH(date)=MONTH(now()) and YEAR(date)=YEAR(now()) limit $start_from,$num_per_page";
                      $sql = "SELECT * FROM employees where uname='".$_SESSION["username"]."' AND Date BETWEEN '$startDate' AND '$endDate' limit $start_from,$num_per_page";
					
					}
                    //$result = mysqli_query($link,$query);
                    if($_SESSION["role"] == "admin"){
                        $query = "select * from employees";
                    }else{    
                    //$query = "select * from employees where uname='".$_SESSION["username"]."' and MONTH(date)=MONTH(now()) and YEAR(date)=YEAR(now()) ";
                    $query = "select * from employees where uname='".$_SESSION["username"]."' AND Date BETWEEN '$startDate' AND '$endDate'";
					 
                    }
                    $result = mysqli_query($link,$query);
                    $total_record = mysqli_num_rows($result);
                    $total_page = ceil($total_record/$num_per_page);
                   if($page>1)
                   {
                    echo " <a href='welcome.php?page=".($page-1)."' class='btn btn-primary'>Previous</a>";
                   }
                   for($i=1;$i<$total_page;$i++)
                   {
                       echo "<a href='welcome.php?page=".$i."' class='btn btn-primary'>$i</a>";
                   }
                   if($i>$page)
                   {
                       echo " <a href='welcome.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
                   }
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table border='3' color: #070708 class=' table table-striped'>";
                                     echo "<thead>";
                                        echo "<th>S.No</th>";
                                        echo "<th>Item</th>";
                                        echo "<th>Date</th>";
                                        echo "<th>Amount</th>";
                                        echo "<th>Created By</th>";
										//echo "<th>Download</th>";
                                        echo "<th>Action</th>";
										/*if($_SESSION["role"] == "admin"){
                                           echo "<th>Delete Record</th>";	 
                                        }*/
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
                                        /*if($row['file_path'] != ''){
											echo "<td> <a href='generate_pdf.php?id=". $row['id'] ."' title='Download' data-toggle='tooltip'><span class='glyphicon glyphicon-download'></span></a> </td>";
										} else{
											echo "<td></td>";
										}*/
                                        echo "<td>";
                                        // View Button
                                        echo "<a href='read.php?id=" . $row['id'] . "' title='View Record' data-toggle='tooltip' class='btn btn-primary btn-lg custom-btn'> <span class='glyphicon glyphicon-eye-open'></span></a>";
                                        // Update Button
                                        echo "<a href='update.php?id=" . $row['id'] . "' title='Update Record' data-toggle='tooltip' class='btn btn-warning btn-lg custom-btn'> <span class='glyphicon glyphicon-pencil'></span> </a>";
                                        // Delete Button
                                        echo "<a href='delete.php?id=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip' class='btn btn-danger btn-lg custom-btn'> <span class='glyphicon glyphicon-trash'></span>  </a>";
                                        // Download Button
                                        echo "<a href='generate_pdf.php?id=" . $row['id'] . "' title='Download' data-toggle='tooltip' class='btn btn-success btn-lg custom-btn'> <span class='glyphicon glyphicon-download'></span> </a>";                                        
                                        echo "</td>";
                                         /* if($_SESSION["role"] == "admin"){ 
                                        echo "<td>";
                                             echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                         }*/
                                         echo "</tr>";
                                         $i++;
                                     }
                                echo "</tbody>";                            
                            echo "</table>";


                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
                    // Close connection
                    mysqli_close($link);                
                    ?>
            </div>        
        </div>
    </div>
</body>
<p>I have two rules, Rule no.1 Always have fun, Rule No.2 follow the Rule No.1</p>
</html>