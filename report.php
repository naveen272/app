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
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="css/jquery-ui.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.css">
   </head> 
   <style>
body {
    margin: 3%;
    padding-top: 19%;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 568%;
    line-height: 2.428571;
    color: #101010;
    background-color: #fefefe;
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
                            <form method='post' action='download.php'>
                                <!-- Datepicker -->
                                <input class="form-group" type='date' class='datepicker' placeholder="From date" name="from_date" id='from_date' readonly>
                                <input class="form-group" type='date' class='datepicker' placeholder="To date" name="to_date" id='to_date' readonly>
                                <!-- Export button -->
                                <input type='submit' value='Export' name='Export'>
                                <a href="welcome.php" >Cancel</a>
                            </form>  
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
                   </div>
                  </div>
                 </div>
                </div>
               </div>
           </body>  
</html>
