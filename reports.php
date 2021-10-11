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

