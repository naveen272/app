<?php
require_once "config.php";
//$link = mysqli_init();
//$success = mysqli_connect("localhost", "root", "", "demo");
$sql = mysqli_query($link,"SELECT * from employees WHERE date >= '2021-02-02' AND date <= '2021-02-20';");
//$result = mysqli_query($link,$sql);
//print_r($sql);
//exit;
{
    if(mysqli_num_rows($sql) > 0){
        echo "<table color: #070708 class='table table-striped'>";
                 echo "<thead>";
                echo "<tr>";
                    echo "<th>S.No</th>";
                    echo "<th>Item</th>";
                    echo "<th>Date</th>";
                    echo "<th>Amount</th>";                          
                echo "</tr>";
            echo "</thead>";
    }
            echo "<tbody>";
            while($row = mysqli_fetch_array($sql)){
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['amount'] . "</td>";
             echo "</tbody>";
            }
        }
?>