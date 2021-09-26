<?php
require_once "config.php";
$new_date = date('Y-m-d');
//echo $new_date;
$sql = mysqli_query($link,"SELECT * from employees WHERE date >= '$new_date' AND date <= '$new_date';");
       if(mysqli_num_rows($sql) > 0){
        echo "<table color: #070708 class='table table-striped'>";
                 echo "<thead>";
                echo "<tr>";
                    echo "<th>S.No</th>";
                    echo "<th>Item</th>";
                    echo "<th>Date</th>";
                    echo "<th>Amount</th>";                          
                echo "</tr>";
            echo "</thead>";}
            echo "<tbody>";
            while($row = mysqli_fetch_array($sql)){
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['amount'] . "</td>";
             echo "</tbody>";
            
            }
?>
<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
    .container {
            position: absolute;
            right: 0;
            margin: 2px;
            max-width: 30px;
            padding: 16px;
            background-color: white;
            }
    </style>
</head>
<body>
<div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="col-md-10">
                        <div class="col-md-16">
                            <h2>Get Records</h2>
                        </div>
                            <p>Please select date.</p>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <label>FROM</label>
                            <input type="date" name="date">
                            <label>TO</label>
                            <input type="date" name="date">
                            <input type="submit" class="btn btn-primary" value="Submit">
                            <a href="welcome.php" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div><div class="col-lg-15"></div>        
            </div>
        </div>
</body>
</html>
