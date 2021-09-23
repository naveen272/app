<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>
<?php
require_once "config.php";
if(isset($_GET['page']))
{
    $page = $_GET['page'];
  }
  else{
      $page = 1;
    }
    $num_per_page = 10;
    $start_from = ($page-1)*10;
//$sql = "SELECT * FROM employees where MONTH(date)=MONTH(now()) and YEAR(date)=YEAR(now()) order by date limit $start_from,$num_per_page";  
if($_SESSION["role"] == "admin"){
    $sql = "SELECT * FROM employees where MONTH(date)=MONTH(now()) 
            and YEAR(date)=YEAR(now()) limit $start_from,$num_per_page";
} else{
    $sql = "SELECT * FROM employees where uname='".$_SESSION["username"]."' and MONTH(date)=MONTH(now())
            and YEAR(date)=YEAR(now()) limit $start_from,$num_per_page";
}
$result = mysqli_query($link, $sql);
?>
<html>  
 <head>  
  <title>Export Data</title>  
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
   </head> 
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
 <body>  
 <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <div class="col-md-10">
                     <div class="col-md-16"> 
   <br />  
   <div class="table-responsive">  
    <h2 align="center">Export Data</h2><br /> 
    <table class="table table-bordered">
     <tr>  
                         <th>S.No</th>
                         <th>Item</th>  
                         <th>Date</th>  
                         <th>Amount</th>
                         <th>Created By</th>
     </tr>
     <?php
                                echo "<tbody>";
                                $i=1;
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $i . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['date'] . "</td>";
                                        echo "<td>" . $row['amount'] . "</td>";
                                        echo "<td>" . $row['uname'] . "</td>";
                                        echo "</tr>";
                                        $i++;
                                }
                                echo "</tbody>"; 
                             $query = "select * from employees where MONTH(date)=MONTH(now()) and YEAR(date)=YEAR(now()) order by date";
                             $result = mysqli_query($link,$query);
                             $total_record = mysqli_num_rows($result);
                             $total_page = ceil($total_record/$num_per_page);
                            if($page>1)
                            {
                             echo " <a href='report.php?page=".($page-1)."' class='btn btn-primary'>Previous</a>";
                            }
                            for($i=1;$i<$total_page;$i++)
                            {
                                echo "<a href='report.php?page=".$i."' class='btn btn-primary'>$i</a>";
                            }
                            if($i>$page)
                            {
                                echo " <a href='report.php?page=".($page+1)."' class='btn btn-danger'>Next</a>";
                            }
     ?>
    </table>
    <input style="color:black;" color: #070708 class="form-control" value="<?php
                    require_once "config.php";
					if($_SESSION["role"] == "admin"){
						$sql = mysqli_query($link,"SELECT SUM(amount) as amount FROM employees where MONTH(date)=MONTH(now()) and YEAR(date)=YEAR(now())");
					} else{
						$sql = mysqli_query($link,"SELECT SUM(amount) as amount FROM employees where uname='".$_SESSION["username"]."' and MONTH(date)=MONTH(now()) and YEAR(date)=YEAR(now())");
					}
                    $row = mysqli_fetch_array($sql);
                    echo $row['amount'];
?>"/> 
    <br />
        <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
     <a href="welcome.php" class="btn btn-danger">Cancel</a>
     <a href="logout.php" class="btn btn-danger">Sign Out</a>
    </form>
   </div>  
  </div> 
   </body>  
</html>
