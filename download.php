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
include "config.php";
$filename = 'Report'.'.csv';

// POST values
$from_date = $_POST['from_date'];
$to_date = $_POST['to_date'];

// Select query
$query = "SELECT * FROM employees ORDER BY id asc";

if(isset($_POST['from_date']) && isset($_POST['to_date'])){
    if($_SESSION["role"] == "admin"){
	$query = "SELECT * FROM employees where date between '".$from_date."' and '".$to_date."' ORDER BY id asc";
    }else{
    $query = "SELECT * FROM employees where uname='".$_SESSION["username"]."' and date between '".$from_date."' and '".$to_date."' ORDER BY id asc";
}}

$result = mysqli_query($link,$query);
$employee_arr = array();

// file creation
$file = fopen($filename,"w");

// Header row - Remove this code if you don't want a header row in the export file.
$employee_arr = array("S.No","name","date","amount","Created By","Documents"); 
fputcsv($file,$employee_arr);  
$i=1; 
while($row = mysqli_fetch_assoc($result)){
    $id = $i;
    $name = $row['name'];
    $date = $row['date'];
    $amount = $row['amount'];
    $uname = $row['uname'];
    $files= $row['file_path'];
    // Write to file 
    $employee_arr = array($id,$name,$date,$amount,$uname,$files);
    fputcsv($file,$employee_arr);  
    $i++; 
}

fclose($file); 
// download
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=$filename");
header("Content-Type: application/csv; "); 

readfile($filename);

// deleting file
unlink($filename);
exit();
