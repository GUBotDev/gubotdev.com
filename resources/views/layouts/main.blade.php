<!DOCTYPE HTML>
<html>
    <head>
        <title>@yield('title') - GUBotDev</title>
        <meta charset="utf-8" />
        <link rel="shortcut icon" href="{{ URL::asset('assets/images/icon.ico') }}" type="image/x-icon" >
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}" />
    </head>
   <body>
	  	<div id="page-wrapper">
            @include('__partials.navheader')
    		@include('__partials.modals.login')
    		@include('__partials.modals.signup')
            @include('__partials.modals.contact')
            @include('__partials.mobilenavheader')

            <!-- error -->
            <nav id="error">
                <div class="inner"  style="width: 24.75em">
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


            @yield('content')

	  
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

        <script src="{{ URL::asset('assets/js/skel.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/jquery.scrollex.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/util.js') }}"></script>
        <script src="{{ URL::asset('assets/js/main.js') }}"></script>
        <script src="{{ URL::asset('assets/js/jquery.rwdImageMaps.min.js') }}"></script>
        <script>
            $(document).ready(function(e) {
                $('img[usemap]').rwdImageMaps();
            });

            var ids = ["contactHide", "loginHide", "signUpHide", "errorsHide"];

            function toggleVisibility(id) {
                var el = document.getElementById(id);

                if (id == 'mainMenuBlock'){
                    document.getElementById("mainMenu").style.display = 'block';
                    document.getElementById("contactHide").style.display = 'none';
                    document.getElementById("loginHide").style.display = 'none';
                    document.getElementById("signUpHide").style.display = 'none';

                } else {
                    el.style.display = 'block';

                    if (id == ids[0]){
                        document.getElementById("loginHide").style.display = 'none';
                        document.getElementById("signUpHide").style.display = 'none';
                    } else if (id == ids[1]){
                        document.getElementById("contactHide").style.display = 'none';
                        document.getElementById("signUpHide").style.display = 'none';
                    } else if (id == ids[2]){
                        document.getElementById("contactHide").style.display = 'none';
                        document.getElementById("loginHide").style.display = 'none';
                    } else if (id == ids[3]){
                        document.getElementById("loginHide").style.display = 'none';
                        document.getElementById("signUpHide").style.display = 'none';
                        document.getElementById("contactHide").style.display = 'none';
                    }

                    document.getElementById("mainMenu").style.display = 'none';
                }
            };

        </script>
    </body>
</html>