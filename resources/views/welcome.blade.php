<!DOCTYPE HTML>
<html>
   <head>
      <title>GUBotDev</title>
      <meta charset="utf-8" />
      <link rel="shortcut icon" href="assets/images/icon.ico" type="image/x-icon" >
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="stylesheet" href="assets/css/main.css" />
   </head>
   <body>
      <div id="page-wrapper">
         <!-- header -->
         <header id="header" class="alt">
            <h1><a href="index.php" class="logoImg"><img src="assets/images/logo2.png"></a></h1>
            <nav>
               <a href="index.php" class="button">Home</a>
               <a href="projects.php" class="button">Projects</a>
               <a href="videos.php" class="button">Videos</a>
               <a href="#contact" class="button">Contact</a>
               <a href="#menu" class="button"><i class="fa fa-bars"></i> Menu</a>
               <a href='#login' class='button' style='margin: 0 1em 0 0'>Log In</a>
               <a href='#signup' class='button'>Sign Up</a>

               <!-- If isset error: <a href='#error' class='error button' style='margin: 0 1em 0 0'>Error</a> -->
               <!-- If user is logged in:  "<a href='#cart' class='button' style='margin: 0 1em 0 0'>Cart</a>"
                    "<a href='userPage.php' class='button' style='margin: 0 1em 0 0'>".\SESSION[ \'username'\ ]."</a>"
                    "<a href='logout.php' class='button'>Log Out</a>"
               -->
               <!-- Else: <a href='#login' class='button' style='margin: 0 1em 0 0'>Log In</a> <a href='#signup' class='button'>Sign Up</a> -->

            </nav>
         </header>
         <!-- login -->
         <nav id="login">
            <div class="inner" style="width: 24.75em">
               <form role="form" method="post" action="" autocomplete="off">
                  <h2>Log In</h2>
                  <!-- If isset  -->
                  <input type="text" name="username1" id="username" placeholder="User Name" value="null" tabindex="1" style="margin-bottom: 1em">
                  <input type="password" name="password1" id="password" placeholder="Password" tabindex="3" style="margin-bottom: 1em">
                  <p>
                     <input type="submit" name="submit1" value="Log In" class="button fit" tabindex="5" >
                     <a href='reset.php' class='button fit'>Forgot Password?</a>
                  </p>
               </form>
               <p>
                  <a href="#" class="close">Close</a>
               </p>
            </div>
         </nav>
         <!-- signup -->
         <nav id="signup">
            <div class="inner"  style="width: 24.75em">
               <form role="form" method="post" action="" autocomplete="off">
                  <h2>Sign Up</h2>
                  <input type="text" name="username2" id="username" placeholder="User Name" value="null" tabindex="1" style="margin-bottom: 1em">
                  <input type="email" name="email2" id="email" placeholder="Email Address" value="null" tabindex="2" style="margin-bottom: 1em">
                  <input type="password" name="password2" id="password" placeholder="Password" tabindex="3" style="margin-bottom: 1em">
                  <input type="password" name="passwordConfirm2" id="passwordConfirm" placeholder="Confirm Password" tabindex="4" style="margin-bottom: 1em">
                  <p>
                     <input type="submit" name="submit2" value="Sign Up" class="button fit" tabindex="5" style="margin-bottom: 1em">
                  </p>
               </form>
               <p>
                  <a href="#" class="close">Close</a>
               </p>
            </div>
      </div>
      </nav>
      <!-- error -->
      <nav id="error">
         <div class="inner"  style="width: 24.75em">
            <a href="#" class="close">Close</a>
         </div>
         </div>
      </nav>
      <!-- contact -->
      <nav id="contact">
         <div class="inner" style="width: 40em">
            <h2>Get in touch!</h2>
            <h1><i class="icon fa-phone"></i>&zwnj; Phone: <a href="tel:814-871-556">814-871-5566</a></h1>
            <h1><i class="icon fa-at"></i>&zwnj; Email: <a href="mailto:gubotdev@gmail.com">contact@gubotdev.com</a></h1>
            <h1><i class="icon fa-envelope"></i>&zwnj; Mail: 109 University Sq. Erie, PA 16510</h1>
            <a href="https://github.com/GUBotDev" class="icon fa-github"><span class="label">Github</span></a>
            <a href="https://www.facebook.com/GUBotDevelopment" class="icon fa-facebook"><span class="label">Facebook</span></a>
            <a href="https://twitter.com/gubotdev" class="icon fa-twitter"><span class="label">Twitter</span></a>
            <a href="https://www.youtube.com/channel/UCZmfiBEb2jFXskunSBqsjGA" class="icon fa-youtube"><span class="label">YouTube</span></a>
            <p></p>
            <a href="#" class="close">Close</a>
         </div>
      </nav>
      <!-- cart -->
      <nav id="cart">
         <div class="inner" style="width: 40em">
            <form id="myContainer" method="post" action="/checkout" style=".button{width: 80%; padding: 4em, 0, 4em, 0}" class="button fit"></form>
            <script>
               window.paypalCheckoutReady = function () {
                 paypal.checkout.setup('<Your-Merchant-ID>', {
                     environment: 'sandbox',
                     container: 'myContainer'
                   });
               };
            </script>
            <script src="//www.paypalobjects.com/api/checkout.js" async></script>
            <form role="form" method="post" action="" autocomplete="off">
               <h3 class="major">Buy Now</h3>
               <input type="submit" name="submit2" value="Pay With PayPal" class="button fit" tabindex="5" style="margin-bottom: 1em">
            </form>
            <form role="form" method="post" action="" autocomplete="off">
               <input type="submit" name="submit2" value="Pay With CoinBase" class="button fit" tabindex="5" style="margin-bottom: 1em">
            </form>
            <p></p>
            <a href="#" class="close">Close</a>
         </div>
      </nav>
      <!-- menu -->
      <nav id="menu">
         <div class="inner"  style="width: 24.75em">
            <div id="mainMenu" style="display: block">
               <a href="index.php" class="button" style="width: 40%; margin-bottom: 1em">Home</a>
               <a href="projects.php" class="button" style="width: 40%; margin-bottom: 1em">Projects</a>
               <a href="videos.php" class="button" style="width: 40%; margin-bottom: 1em">Videos</a>
               <a href="javascript:toggleVisibility('contactHide')" class="button" style="width: 40%; margin-bottom: 1em">Contact</a>
                     <a href='javascript:toggleVisibility(".'"loginHide"'.")' class='button' style='width: 40%; margin-bottom: 1em'>Log In</a>
                     <a href='javascript:toggleVisibility(".'"signUpHide"'.")' class='button' style='width: 83%; margin-bottom: 1em'>Sign Up</a>
            </div>
            <div id="contactHide" style="display: none; ">
               <h2>Get in touch!</h2>
               <h1><i class="icon fa-phone"></i>&zwnj; Phone: <a href="tel:814-871-556">814-871-5566</a></h1>
               <h1><i class="icon fa-at"></i>&zwnj; Email: <a href="mailto:gubotdev@gmail.com">contact@gubotdev.com</a></h1>
               <h1><i class="icon fa-envelope"></i>&zwnj; Mail: 109 University Sq. Erie, PA 16510</h1>
               <a href="https://github.com/GUBotDev" class="icon fa-github"><span class="label">Github</span></a>
               <a href="https://www.facebook.com/GUBotDevelopment" class="icon fa-facebook"><span class="label">Facebook</span></a>
               <a href="https://twitter.com/gubotdev" class="icon fa-twitter"><span class="label">Twitter</span></a>
               <a href="https://www.youtube.com/channel/UCZmfiBEb2jFXskunSBqsjGA" class="icon fa-youtube"><span class="label">YouTube</span></a>
               <p></p>
               <a href="javascript:toggleVisibility('mainMenuBlock')" class="button fit">Back to Menu</a>
            </div>
            <div id="loginHide" style="display: none;">
               <form role="form" method="post" action="" autocomplete="off">
                  <h2>Log In</h2>
                  
                  <input type="text" name="username1" id="username" placeholder="User Name" value="null" tabindex="1" style="margin-bottom: 1em">
                  <input type="password" name="password1" id="password" placeholder="Password" tabindex="3" style="margin-bottom: 1em">
                  <p>
                     <input type="submit" name="submit1" value="Log In" class="button fit" tabindex="5" >
                     <a href='reset.php' class='button fit'>Forgot Password?</a>
                  </p>
               </form>
               <a href="javascript:toggleVisibility('mainMenuBlock')" class="button fit">Back to Menu</a>
            </div>
            <div id="signUpHide" style="display: none;">
               <form role="form" method="post" action="" autocomplete="off">
                  <h2>Sign Up</h2>
                  <input type="text" name="username2" id="username" placeholder="User Name" value="null" tabindex="1" style="margin-bottom: 1em">
                  <input type="email" name="email2" id="email" placeholder="Email Address" value="null" tabindex="2" style="margin-bottom: 1em">
                  <input type="password" name="password2" id="password" placeholder="Password" tabindex="3" style="margin-bottom: 1em">
                  <input type="password" name="passwordConfirm2" id="passwordConfirm" placeholder="Confirm Password" tabindex="4" style="margin-bottom: 1em">
                  <p>
                     <input type="submit" name="submit2" value="Sign Up" class="button fit" tabindex="5" style="margin-bottom: 1em">
                  </p>
               </form>
               <a href="javascript:toggleVisibility('mainMenuBlock')" class="button fit">Back to Menu</a>
            </div>
            <div id="errorsHide" style="display: none; ">
               <a href="javascript:toggleVisibility('mainMenuBlock')" class="button fit">Back to Menu</a>
            </div>
            <a href="#" class="close">Close</a>
         </div>
         </div>
      </nav>
      <!-- Banner -->
      <section id="banner">
         <div class="inner">
            <div class="logo"><img src="assets/images/logo.png" style="width: 40%"></img></div>
            <h2></h2>
            <p>I have no idea what to write here, but something should go here. </p>
         </div>
      </section>
      <!-- Wrapper -->
      <section id="wrapper">
         <!-- One -->
         <section id="one" class="wrapper spotlight style1">
            <div class="inner">
               <a href="#" class="image"><img src="assets/images/gu3.jpg" alt="" /></a>
               <div class="content">
                  <h2 class="major">We do things</h2>
                  <p>lots of things</p>
                  <a href="projects.php" class="special">Projects</a>
               </div>
            </div>
         </section>
         <!-- Two -->
         <section id="two" class="wrapper alt spotlight style2">
            <div class="inner">
               <a href="#" class="image"><img src="assets/images/panel1.gif" alt="" /></a>
               <div class="content">
                  <h2 class="major">we make videos</h2>
                  <p>watch em</p>
                  <a href="videos.php" class="special">Videos</a>
               </div>
            </div>
         </section>
         <!-- Three -->
         <section id="three" class="wrapper spotlight style3">
            <div class="inner">
               <a href="#" class="image"><img src="assets/images/gu0.jpg" alt="" /></a>
               <div class="content">
                  <h2 class="major">want us to do stuff for you?</h2>
                  <p>contact us</p>
                  <a href="#contact" class="special">Contact</a>
               </div>
            </div>
         </section>
         <!-- Four -->
         <section id="four" class="wrapper alt style1">
            <div class="inner">
               <section class="features">
               </section>
            </div>
         </section>
      </section>
      <!-- footer -->
      <section id="footer">
         <div class="inner">
            <div class="copyright">
                &copy; 2015-2016 GUBotDev. All rights reserved.
            </div>
            <ul class="social">
               <li><a href="https://github.com/GUBotDev" class="icon fa-github"><span class="label">Github</span></a></li>
               <li><a href="https://www.facebook.com/GUBotDevelopment" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
               <li><a href="https://twitter.com/gubotdev" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
               <li><a href="https://www.youtube.com/channel/UCZmfiBEb2jFXskunSBqsjGA" class="icon fa-youtube"><span class="label">YouTube</span></a></li>
            </ul>
         </div>
      </section>
      </div>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery.scrollex.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>
      <script src="assets/js/jquery.rwdImageMaps.min.js"></script>
      <script>
        
         
         
             
      </script>
   </body>
</html>