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
?>
<!doctype html>
<html>
    <head>
        <title>How to Export MySQL data to CSV by Date range with PHP</title>    
        <link href="style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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
form, .content {
    width: 71%;
    margin: 30%;
    padding: 20px;
    border: 31% solid #B0C4DE;
    /* background: white; */
    border-radius: 24px 37px 45px 36px;
}
</style>
    </head>
    <body>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <div class="col-md-10">
                     <div class="col-md-16">
                      <form method='post' action='download.php'>
                        <!-- Datepicker -->
                        <input class="form-group" type='text/css' class='datepicker' placeholder="From date" name="from_date" id='from_date' readonly>
                        <input class="form-group" type='text/css' class='datepicker' placeholder="To date" name="to_date" id='to_date' readonly>
                        <!-- Export button -->
                        <input type='submit' value='Export' name='Export'>
                        <a href="welcome.php" >Cancel</a>
                    </form>  
            <!--<table border='1' style='border-collapse:collapse;'>
                <tr>
                    <th>S.No</th>
                    <th>Item</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Created By</th>
                </tr>
                <?php 
                if($_SESSION["role"] == "admin"){
                $query = "SELECT * FROM employees ORDER BY id asc";
                }else{
                $query = "SELECT * FROM employees where uname='".$_SESSION["username"]."' and ORDER BY id asc";
                }
                $result = mysqli_query($link,$query);
                $employee_arr = array();
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row['id'];
                    $name = $row['name'];
                    $date = $row['date'];
                    $amount = $row['amount'];
                    $uname = $row['uname'];
                    $employee_arr[] = array($id,$name,$date,$amount,$uname);
                ?>
                    <tr>
                        <td><?php echo $id; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $date; ?></td>
                        <td><?php echo $amount; ?></td>
                        <td><?php echo $uname; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>-->    

        <!-- Script -->
        <script type='text/javascript' >
        $(document).ready(function(){

            // From datepicker
            $("#from_date").datepicker({ 
                dateFormat: 'yy-mm-dd',changeYear: true,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() + 1);
                    $("#to_date").datepicker("option", "minDate", dt);
                }
            });

            // To datepicker
            $("#to_date").datepicker({
                dateFormat: 'yy-mm-dd',changeYear: true,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() - 1);
                    $("#from_date").datepicker("option", "maxDate", dt);
                }
            });
        });
        </script>
            <!--<input style="color:black;" color: #070708 class="form-control" value="<?php
                    require_once "config.php";
					if($_SESSION["role"] == "admin"){
						$sql = mysqli_query($link,"SELECT SUM(amount) as amount FROM employees where MONTH(date)=MONTH(now()) and YEAR(date)=YEAR(now())");
					} else{
						$sql = mysqli_query($link,"SELECT SUM(amount) as amount FROM employees where uname='".$_SESSION["username"]."' and MONTH(date)=MONTH(now()) and YEAR(date)=YEAR(now())");
					}
                    $row = mysqli_fetch_array($sql);
                    echo $row['amount'];
?>"/> -->
 </div>
 </div>
 </div>
 </div>
 </div>
    </body>
</html>

