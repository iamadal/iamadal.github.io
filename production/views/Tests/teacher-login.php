<!-- MC -->

<!-- UI -->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="views/css/normalize.min.css">
		<link rel="shortcut icon" type="image/jpg" href="img/fav.png">
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans:wght@300;400&family=Roboto:wght@100;300;400&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<title>Green University of Bangladesh</title>
	</head>
	<body>
		<div class="container">
			<!-- Header section -->
			<div class="header">
				<header class="head-section">
					<div class="logo"><img src="img/logo.svg" alt="logo" width="80px" height="auto" /></div>
					<h1 class="hTitle">Green University of Bangladesh <br><sub class="sub"> <i>GUB Management System</i> </sub></h1>
				</header>
			</div>
			<!-- main content area -->
			<div class="content">
              <div class="title-wrap">
              	<img src="img/avater-male.png" height="80px" width="80px">
              	<h1>  <i class="fa fa-user"></i> Please verify your identity</h1>
              	<p>   <i class="fa fa-lock"></i> Student Login</p>
              </div>

             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="input-wrap">
              	  <div> 
              	  	 <i class="fa fa-user"></i> Username
              	  	 <input id="admin-email" type="text"  name="username"  placeholder="username"></div>
              	  

              	  <div>
              	    <i class="fa fa-lock"></i> Password
              	    <input id="admin-pass" type="password" name="password" placeholder="Password" class="">
              	  </div>
                  

                  <div><input class="login-button" type="submit" value="login"></div>
              </div>
			</form>
			</div>
			
			<!-- footer section -->
			<div class="footer">
				<p>Copyright&copy; Department of CSE - GUB - 2021</p>
			</div>
		</div>
	</body>
</html>
<!-- Stylesheets -->
<style>
    {border: 1px solid red;}
body,html {font-family: 'Roboto';}
* {outline:0;box-sizing: border-box;}
/* handle very small devices < 320px*/
.container { background-color: #fff; box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}

.head-section              { border: 1px solid #f0f0f0;display: flex;flex-wrap: wrap;}
.head-section .logo        { }
.head-section .hTitle      { font-size: 1em;font-weight: 500;color: #2d8016;margin-top: 1em;font-family: 'ubuntu';}
.head-section .hTitle .sub { font-weight: 500;color: #3C6E1B;}

.footer p {text-align: center; font-family: 'Roboto' ; font-weight: normal; font-size: 14px; color: #fff; background-color: #fc7703; padding: 5px}

.content .title-wrap         { font-family: 'Roboto'; font-weight: normal}
.content .title-wrap h1      { font-family: 'Roboto'; font-weight: 300; text-align: center; font-size: 24px}
.content .title-wrap p       { font-family: 'Roboto'; font-weight: 300; text-align: center;}
.content .title-wrap img     {margin-left: 40%;}

.content .input-wrap         {}
.content .input-wrap  div    { padding: 2px; width: 100%; margin: 0 auto}

#admin-email,#admin-pass {width: 100%;padding: 10px; margin-left: -1px; border: 1px solid #f0f0f0; background-color: #ddd; border-radius: 5px}
#admin-email:focus,#admin-pass:focus {border: 1px solid #fc7703; transition: all  1s}
.login-button {text-transform: uppercase;background-color: #fc7703;padding: 10px; color: #fff; border: 1px solid #fc7703; width: 100%; border-radius: 5px}


.container {width: 100%}

/* media queries*/
/* Very Small devices*/
@media (min-width: 320px){
	.container {width: 98%;margin:0 auto;margin-top: 5px; }
	.content .input-wrap  div {width: 90%; margin:0 auto;}
}
/*Smart Phones*/
@media (min-width: 481px){
    .container {width: 98%;margin:0 auto;margin-top: 10px;}
    .content .input-wrap  div {width: 60%; margin:0 auto;}
}
/* Table */
@media (min-width: 768px){
   .container {width: 60%;margin:0 auto; margin-top: 50px; }
   .content .input-wrap  div {width: 50%; margin:0 auto;}
}
/*Desktop*/
@media (min-width: 1364px){
	.container {width: 40%; margin:0 auto; margin-top: 70px;}
    .content .input-wrap  div {width: 50%; margin:0 auto;}
    
}


/* Custom UI Control*/





</style>
<!-- Script -->
<script>
	 /* Header clock*/
     const line = document.querySelector(".sub"); function time(){line.innerHTML = "GUB Management System<br/>" + new Date().toLocaleString();};setInterval(time,1000);
</script>