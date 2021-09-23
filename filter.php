<?php  
  require_once "config.php";
  $query = "SELECT * FROM employees ORDER BY date desc";  
  $result = mysqli_query($link, $query);  

 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $output = '';  
      $query = "  
           SELECT * FROM employees  
           WHERE date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($link, $query);  
      $output .= '  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">S.No</th>  
                     <th width="30%">Item</th>  
                     <th width="43%">date</th>  
                     <th width="10%">amount</th>
                     <th width="20%">Created By</th>  
                </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["id"] .'</td>  
                          <td>'. $row["name"] .'</td>  
                          <td>'. $row["date"] .'</td>  
                          <td>'. $row["amount"] .'</td>
                          <td>'. $row["uname"] .'</td>  
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Order Found</td>  
                </tr>  
           ';  
      }  
      
      $output .= '</table>';  
      echo $output;  
 }  
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<a style="color:black;" class="btn">Total
<input style="color:black;" color: #070708 class="form-control" value="<?php
                    require_once "config.php";
					$sql = mysqli_query($link,"SELECT SUM(amount) as amount FROM employees WHERE date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'");
					$row = mysqli_fetch_array($sql);
                    echo $row['amount'];
?>"/> </a>     
     <form method="post" action="export.php/?fromdate=<?php echo $_POST["from_date"]; ?>&todate=<?php echo $_POST["to_date"]; ?>">
     <input type="submit" name="export" class="btn btn-success" value="Export" />      
</form>
</body>
</html>