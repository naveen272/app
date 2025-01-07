<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/3/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<body>
<!-- Navigation -->
<nav class="w3-bar w3-black">
  <a href='login.php' class="w3-button w3-bar-item">Login</a>
  <a href='register.php' class="w3-button w3-bar-item">Register</a>
  <a href='contactus.php' class="w3-button w3-bar-item">Contactus</a>
  </nav>
 <!-- Slide Show -->
<section>
  <img class="mySlides" src="./images/image1.jpg"  style="width:125%">
  <img class="mySlides" src="./images/image2.jpg"  style="width:125%">
  <img class="mySlides" src="./images/image3.jpg"  style="width:125%">
  <img class="mySlides" src="./images/image4.jpg"  style="width:125%">
  <img class="mySlides" src="./images/image5.jpg"  style="width:125%">
  <img class="mySlides" src="./images/image6.jpg"  style="width:125%">

</section>
<!-- Band Description -->
  <section class="w3-container w3-center w3-content" style="max-width:500px">
  <p class="w3-wide">Success is never owned, it's rented and rent is due everyday ...Naveen</p>
  <p class="w3-wide"><i>Welcome To My Creations</i></p>
  </section>
<!-- Band Members -->
<!-- Footer -->
<footer class="w3-container  w3-center w3-black w3-xlarge">
  <a href="https://www.facebook.com/naveen.chowdary.7946/"><i class="fa fa-facebook-official"></i></a>
  <a href="https://www.youtube.com/@sravaniboginni"><i class="fa fa-youtube"></i></a>
  <a href="#"><i class="fa fa-twitter"></i></a>
  <a href="https://www.instagram.com/chowdary_naveen143/"><i class="fa fa-instagram"></i></a>
  <a href="images/whatsapp.png"><i class="fa fa-whatsapp"></i></a>
  <p class="w3-medium">
  <a href='https://accounts.google.com/signin/v2/identifier?flowName=GlifWebSignIn&flowEntry=ServiceLogin'  class="fa fa-envelope w3-large"></a> naveencheekati2@gmail.com
  <a w3-left ><i class="fa fa-mobile w3-xlarge" ></i>9553667939</a>
</footer>
<footer class="w3-container">
Powered by <a href="https://naveen.ddns.net/" target="_blank">Naveen</a>
  <a> © Copyright 2025</a> 
  </footer>
<script>
// Automatic Slideshow - change image every 3 seconds
var myIndex = 0;
carousel();
function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}
  x[myIndex-1].style.display = "block";
  setTimeout(carousel, 3000);
}
</script>
</body>
</html>

