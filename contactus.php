<?php error_reporting(E_ERROR | E_PARSE); ?>
<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 require 'PHPMailer/src/Exception.php';
 require 'PHPMailer/src/PHPMailer.php';
 require 'PHPMailer/src/SMTP.php';
if(isset($_POST['submit'])) {
$mailerName= ($_POST['name']);
$usermail= ($_POST['email']);
$message1= ($_POST['message']);
$mail = new PHPMailer(true);
if($mail){
    $mail->IsSMTP(); 
    $mail->SMTPAuth = true;
    $email->SMTPSecure = 'STARTTLS';
    //$mail->SMTPSecure = "ssl"; 
    $mail->IsHTML(true);
    $mail->Host = "smtp.gmail.com"; 
    $mail->Port = 587; 
    //$mail->Username = "testconqueroo@gmail.com"; 
    //$mail->Password = "Softforce@100";
    $mail->Username = "homesgoods3@gmail.com"; 
    $mail->Password = "N@veen@141";

    }
$message = "<h3>Name:</h3>".$mailerName."<br><h3>Mail Id :</h3>".$usermail."<br><h3>Feedback :</h3>".$message1;

	$mail->AddAddress("naveencheekati2@gmail.com",$mailerName);
	$mail->SetFrom($usermail,"Hi Naveen"	);
	$mail->Subject = "Feedback From viewer";
	$mail->Body = $message;
 try{
     $mail->Send(); 
     echo "<script> alert('Form Submitted Successfully.');</script>";
} catch(Exception $e){
    //echo "Fail - " ;. $mail->ErrorInfo;
	echo "Fail - ". $mail->ErrorInfo;
 }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
</script>
  <link rel="stylesheet" href="css/global.css">
  <link rel="stylesheet" href="css/footer.css">
</head>
<body>
  <div class="main">
    <?php include('header.php');?>
    <div class="main-body">
      <br><br>
      <div class="contactus">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-5 null-padding"></div>
            <div class="col-md-7  null-padding">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-md-2 t-title">Contact Us</div>
                  <div class="col-md-10 t-title-border"></div>
                </div>
              </div>
            </div>
            <div class="container">
              <div class="col-md-7 col-md-offset-2">
                <p>We welcome's you</p>
                <div class="contact-form">
                  <!-- <div class="form-fields"></div> -->
                  <form class="form-horizontal"  method="post" action="">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="name">Name:</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>					
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="email">Email:</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="message">Message:</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="message" rows="6" placeholder="Enter message" name="message" required></textarea>              
                      </div>
                    </div>
                      <div class="text-right" style="text-align: left; margin-left: 102px;">
                      <input type="submit"  name="submit" class="btn btn-primary" >
                      <a href="index.php" class="btn btn-danger">Cancel</a>
                      </div>
                                <div id="myModal" class="modal">
                      <div class="modal-content">
                        <span class="close">&times;</span>
                        <p>Feedback Submitted Successfully.</p>
                      </div>
                    </div>
                  </form>             
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include('footer.php');?>
</body>
</html>