<?php 
require_once "config.php"; 
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM employees where MONTH(date)=MONTH(now()) and YEAR(date)=YEAR(now()) order by date";
 //$query = "SELECT * FROM employees order by date";
 $result = mysqli_query($link, $query);
 if(mysqli_num_rows($result))
 {
  $output .= '
  <h1 align="center">Report</h1>
  <table class="table table-bordered">
                    <tr>  
                         <th>S.No</th>
                         <th>Item</th>  
                         <th>Date</th>  
                         <th>Amount</th>
                         <th>Created BY</th> 
                    </tr>';
    while($row = mysqli_fetch_array($result))
  {$output .= '<tr>  
                         <td>' .$row['id'].' </td>
                         <td>'.$row["name"].'</td>  
                         <td>'.$row["date"].'</td>  
                         <td>'.$row["amount"].'</td>
                         <td>'.$row["uname"].'</td>  
                         </tr>';}
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Report.xls');
  echo $output;
 }
}
$sql = mysqli_query($link,"SELECT SUM(amount) as amount FROM employees where MONTH(date)=MONTH(now()) and YEAR(date)=YEAR(now())");
$row = mysqli_fetch_array($sql);
echo $row['amount'];
?>