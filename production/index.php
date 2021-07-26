<?php
  $marquee = 'Green University of Bangladesh initiated new Online Apps due to COVID-19 <a href="index.php"> Click Here to see Live Preview </a>  - All students must join with google meet in order to take online classes during COVID-19 - ';
?>









<!-- UI -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/css/normalize.min.css">
    <link rel="shortcut icon" type="image/jpg" href="img/fav.png">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans:wght@300;400&family=Roboto:wght@100;300;400&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Green University of Bangladesh</title>
  </head>
  <body>
    <div class="container">
      <!-- Header section -->
      <header class="head-section">
        <div class="logo"><img src="img/logo.svg" alt="logo" width="80px" height="auto" /></div>
        <h1 class="hTitle">Green University of Bangladesh <br><sub class="sub"> <i>GUB Management System</i> </sub></h1>
      </header>
      <!-- Navigation System -->
      <div class="navbar">
        <ul>
          <li><a href="index.php"> <i class="fa fa-home" aria-hidden="true"></i> Home </a></li>
          <li><a href="views/exam.php"> <i class="fa fa-book" aria-hidden="true"></i> Exam </a></li>
          <li><a href="views/admin.php"><i class="fa fa-cog" aria-hidden="true"></i> Admin </a></li>
          <li><a href="views/login.php"><i class="fa fa-lock" aria-hidden="true"></i> Login </a></li>
        </ul>
        <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"><i class="fa fa-circle"></i> <?php echo $marquee ?></marquee>
      </div>
      <!-- main content area -->
      <div class="content">
        <!-- Slider animation -->
        <div class="mid-1">
             <div class="sliders">
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <h1>Green University of Bangladesh</h1>
                        <p> Web Based Management System </p>
                        <div class="text">Admission</div>
                        <div class="numbertext">1 / 7</div>
                    </div>
                    <div class="mySlides fade">
                        <img src="img/ieb.jpg" style="width:100%">
                        <div class="text">IEB</div>
                        <div class="numbertext">2 / 7</div>
                    </div>
                    <div class="mySlides fade">
                        <img src="img/teacher.jpg" style="width:100%">
                        <div class="text"><a href="#">Our Teachers</a></div>
                        <div class="numbertext">3 / 7</div>
                    </div>
                    <div class="mySlides fade">
                        <img src="img/2.png" style="width:100%">
                        <div class="text">Administration</div>
                        <div class="numbertext">4 / 7</div>
                    </div>
                    <div class="mySlides fade">
                        <img src="img/3.png" style="width:100%">
                        <div class="img/text"></div>
                        <div class="numbertext">5 / 7</div>
                    </div>
                    <div class="mySlides fade">
                        <img src="img/4.png" style="width:100%">
                        <div class="text"></div>
                        <div class="numbertext">6 / 7</div>
                    </div>
                    <div class="mySlides fade">
                        <img src="img/3.png" style="width:100%">
                        <div class="text"></div>
                        <div class="numbertext">7 / 7</div>
                    </div>
                </div>
                <br>
                <div style="text-align:center; display: none">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </div>
        <!-- Slider end -->
        <!-- Action Section -->
        <div class="mid-2">
           <p style="background-color: #13940C; color: #fff;text-align: center;padding:5px; margin: 5px" ><i class="fa fa-external-link"></i>Access Point</p>
           <div class="warp">
              <a href="views/admin.php"><i class="fa fa-user"></i> Admin Dashboard</a>
              <a href="views/student-home.php"><i class="fa fa-user"></i> Student's Dashboard</a>
              <a href="view/teacher-home.php"><i class="fa fa-user"></i> Teacher's Dashboard</a>
              <a href="views/exam.php"><i class="fa fa-book"></i> Exam Schedule</a>
              <a href="views/contact.php"><i class="fa fa-book"></i> Contact</a>
              <a href="views/tution.php"><i class="fa fa-book"></i> TFCalculator</a>
           </div>
        </div>
        <!-- Action Section End -->
      </div>
      <!-- footer section -->
      <div class="footer">
        <div class="developer">
          <p style="text-align: center; margin: 0;padding: 5px"><i class="fa fa-globe"></i> Developer Team</p>
          <ol>
            <li><i class="fa fa-group"></i> Arun Kumar - Backend</li>
            <li><i class="fa fa-group"></i> Janantul Ferdaus - FrontEnd</li>
            <li><i class="fa fa-group"></i> RaKiB Hossain - QA</li>
          </ol>
        </div>
        <div class="sitemap">
          <p style="text-align: center;margin: 0;padding: 5px"><i class="fa fa-address-book"></i> Contact </p>
          <ol>
            <li>Main Campus: <br>
                220/D Begum Rokeya Sarani <br>
                Dhaka -1207, Bangladesh</li>
            <li>Phone: 9014725, 8031031, 8060116</li>
            <li>Cell:  01757074304, 01757074302,</li>
          </ol>
        </div>
        <div class="connect">
          <p style="text-align: center;margin: 0;padding: 5px"><i class="fa fa-envelope"></i> Subscribe US</p>
          <div class="form-group">
            
            <input type="email" name="email-subscribe" placeholder="email"> <button>Subcribe</button>
          </div>
          <div class="social">
            <a href="https://www.facebook.com"><img width="30px" height="auto" src="img/facebook.png" alt=""></a>
            <a href="https://www.youtube.com"><img width="30px" height="auto" src="img/youtube.png" alt=""></a>
            <a href="https://www.twitter.com"><img width="30px" height="auto" src="img/twitter.png" alt=""></a>
            <a href="https://www.linkedin.com"><img width="30px" height="auto" src="img/linkedin.png" alt=""></a>
            <a href="https://www.pinterest.com"><img width="30px" height="auto" src="img/pin.png" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </body>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</html>

<!-- Stylesheets -->
<style>
{border: 1px solid red;}
body,html {font-family: 'Roboto'; background-color: #f0f0f0; margin:0;}

/* handle very small devices < 320px*/

.container { background-color: #fff; box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}

.head-section              { border: 1px solid #f0f0f0;display: flex;flex-wrap: wrap;}
.head-section .logo        { }
.head-section .hTitle      { font-size: 1em;font-weight: 500;color: #2d8016;margin-top: 1em;font-family: 'ubuntu';}
.head-section .hTitle .sub { font-weight: 500;color: #3C6E1B;}

.navbar ul                { font-size: 14px;font-weight: 300;margin: 0; padding: 0; font-family: 'ubuntu'; background: #13940c;}
.navbar ul li             { display: inline-block; border-left: 1px solid #20B918;margin-left: -5px;}
.navbar ul li:first-child { border-left:none; margin-left: 0px; }
.navbar ul li a           { text-decoration: none; padding: 10px; display: block; color: #fff; }
.navbar ul li a:hover     { background-color: #20B918; transition: all .3s}
.navbar marquee           { background-color: #6518c4; color: #fff; font-family: 'open sans'; font-size: 14px; padding: 5px;}
.navbar marquee  a        { color: #fff; font-style: italic; }

.content         {display: flex; flex-direction: column; font-family: 'open sans'}
.content .mid-1  {flex: 1 0 100%;}
.content .mid-2  {flex: 1 0 100%; border: 1px solid #f0f0f0;}

.content .mid-2  .warp a { display: block; margin: 5px; background-color: #46BC70; padding: 10px; color: #fff; font-family: 'ubuntu'; font-weight: 300; text-decoration: none }
.content .mid-2  .warp a:hover {background-color: #5bde8a; cursor: pointer;}

.footer                  { width: 100%;font-family: 'ubuntu';font-weight: 300; color: #fff; font-family: 'ubuntu'; display: flex; flex-direction: column;}
.footer .developer       { background-color: #6518C4;}
.footer .developer ol    { list-style: none; margin: 0;}
.footer .developer ol li { font-size: 14px; padding: 5px }

.footer .sitemap         { background-color: #833bdb }
.footer .sitemap ol      { list-style: none; margin: 0; }
.footer .sitemap ol li   { font-size: 14px; padding: 5px}
.footer .sitemap ol li a { color: #fff;}

.footer .connect {background-color: #7526D6}

.footer .connect .form-group                            {padding: 5px}
.footer .connect .form-group input[type="email"]        {width: ;outline: 0; padding: 5px; border-radius: 3px; background-color: #f0f0f0; border: 1px solid #f0f0f0;}
.footer .connect .form-group input[type="email"]:focus  {border: 1px solid #6518C4; transition: all 1s }
.footer .connect .form-group button                     {text-transform: uppercase; margin-top: 2px;cursor: pointer; border: none; background-color: #13940C ;color: #fff;border-radius: 3px; padding: 5px}
.footer .connect .form-group button:hover               {background-color: #4BD144}
.footer .connect .social                                {padding: 10px;}
/* Slider control*/
/* Slide Show*/
.slideshow-container {
    position: relative;
    margin: auto;
    margin-top: 10px;
    margin-left: 2px;
}

/* Caption text */
.text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
    color: #f2f2f2;
    font-size: 12px;
    padding: 8px 12px;
    position: absolute;
    top: 0;
}

/* The dots/bollets/indicators */
.dot {
    height: 5px;
    width: 5px;
    margin: 0 2px;
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
}

.active {
    background-color: #717171;
}

/* Fading animation */
.fade {
    -webkit-animation-name: fade;
    -webkit-animation-duration: 1.5s;
    animation-name: fade;
    animation-duration: 1.5s;
}

@-webkit-keyframes fade {
    from {
        opacity: .01
    }

    to {
        opacity: 1
    }
}

@keyframes fade {
    from {
        opacity: .01
    }

    to {
        opacity: 1
    }
}
 
/* media queries*/
/* Very Small devices*/
@media (min-width: 320px){
     .developer,.sitemap {margin-bottom: 5px; }
}
/*Smart Phones*/
@media (min-width: 481px){
  .container {width: 98%; margin: 0 auto;}
  .developer,.sitemap {margin-bottom: 5px; }

}
/* Table */
@media (min-width: 768px){
  .container          {width: 80%;margin: 0 auto;}
  .container .content {flex-direction: row;}
  .content .mid-1     {flex: 1 0 60%;}
  .content .mid-2     {flex: 1 0 40%;}

  .footer             {flex-direction: row}
  .footer  .developer {flex: 1 0 30%;}
  .footer  .sitemap   {flex: 1 0 30%;}
  .footer  .connect   {flex: 1 0 30%;}
  .developer,.sitemap {margin-bottom: 0px; }

}
/*Desktop*/
@media (min-width: 1364px) {
  .container          {width: 75%;margin: 0 auto;}
  .container .content {flex-direction: row;}
  .content .mid-1     {flex: 1 0 70%;}
  .content .mid-2     {flex: 1 0 30%;}

  .footer             {flex-direction: row}
  .footer  .developer {flex: 1 0 33.3%;}
  .footer  .sitemap   {flex: 1 0 33.3%;}
  .footer  .connect   {flex: 1 0 33.%;}
  .developer,.sitemap {margin-bottom: 0px; }
}

</style>
<!-- Script -->
<script>
	   /* Header clock*/
     const line = document.querySelector(".sub"); function time(){line.innerHTML = "GUB Management System<br/>" + new Date().toLocaleString();};setInterval(time,1000);
    /* Slider control */

     /* Slide show */
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 4000); // Change image every 2 seconds
}

    /* Slider control end*/
</script>