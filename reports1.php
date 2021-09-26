<!DOCTYPE html>  
 <html>  
      <head>  
           <script src="css/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="css/jquery-ui.js"></script>
           <link rel="stylesheet" href="css/jquery-ui.css">
      </head> 
      <style>
      body {
     font-size: 22px;
     color: #070606;
     background-color: #352b2b;
     margin: 65px;
     }
 .form-control {
    display: block;
    width: 94%;
    height: 30px;
    padding: 15px 10px;
    padding-right: 20px;
    color: #555;
    background-color: #fff;
    border: 1px solid #ccc;
    }
      </style> 
      <body>  
           <br /><br />  
           <div class="modal-dialog">
             <div class="modal-content">
               <div class="modal-header">
                
                   <div class="col-md-16">
                   <div class="table-responsive"> 
                <h2 align="center">Old Data</h2>  
                <div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="Search" class="btn btn-info" />  
                     <a href="welcome.php" class="btn btn-danger">Cancel</a>
                </div>
                <div style="clear:both"></div>                 
                <br />  
                <div id="employees">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th>S.No</th>  
                               <th>Item</th>  
                               <th>date</th>  
                               <th>amount</th>
                               <th>Created By</th>  
                          </tr>  
                     </table>  
                </div>  
           </div> 
      </body>  
 </html>  
 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#employees').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>