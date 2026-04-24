<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Clinic || @yield('tilte')</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">
        <!-- Favicons -->
        <link href="img/favicon.ico" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600|Nunito:600,700,800,900" rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="{{ asset('front/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="{{ asset('front/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('front/vendor/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('front/vendor/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('front/vendor/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="{{ asset('front/css/hover-style.css') }}" rel="stylesheet">
        <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">
        @yield('css')
    </head>

    <body>
        <!-- Top Header Start -->
        <section class="top-header">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        <h1><a href="{{ route('front.index') }}">Dr. Johnson</a></h1>
                        <!-- <a class="brand" href="index.html" title="Home"><img alt="Logo" src="img/logo.png"></a> -->
                    </div>
                </div>

                <div class="col-md-12">
                    <h2>Your Family Doctor</h2>
                    <a class="btn btn-full" href="{{ route('front.booking') }}">Book an Appointment</a>
                </div>
            </div>
        </section>
        <!-- Top Header End -->

        <!-- Header Start -->
        <header id="header">
            <div class="container">
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="{{ route('front.index') }}">Home</a></li>
                        <li><a href="{{ route('front.about') }}">About</a></li>
                        <li><a href="{{ route('front.service') }}">Services</a></li>
                        <li><a href="{{ route('front.booking') }}">Booking</a></li>
                        <li><a href="{{ route('front.login') }}">Login</a></li>
                        <!-- <li class="menu-has-children"><a href="#">pages</a> -->
                            <!-- <ul>
                                <li><a href="login.html">Login</a></li>
                                <li class="menu-has-children"><a href="#">Drop Down</a>
                                    <ul>
                                        <li><a href="#">Drop Down 1</a></li>
                                        <li><a href="#">Drop Down 2</a></li>
                                    </ul>
                                </li>
                            </ul> -->
                        <!-- </li> -->
                        <li><a href="{{ route('front.contact') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <!-- Header End -->


@yield('content');


            <!-- Subscriber Section Start -->
            <section id="subscriber">
                <div class="container">
                    <h3>Get Free Consultation</h3>
                    <form class="form-inline">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your Email Goes Here">
                        </div>
                        <button type="submit" class="btn">Submit</button>
                    </form>
                </div>
            </section>
            <!-- Subscriber Section end -->

            <!-- Support Section Start -->
            <section id="support">
                <div class="container">
                    <h1>
                        Need help? Call me 24/7 at +1-234-567-8900
                    </h1>
                </div>
            </section>
            <!-- Support Section end -->

        <!-- Footer Start -->
        <footer id="footer">
            <div class="container">
                <div class="copyright">
					<p>&copy; Copyright <a href="#">Your Site Name</a>. All Rights Reserved</p>

					<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
					<p>Designed By <a href="https://htmlcodex.com">HTML Codex</a></p>
                </div>
            </div>
        </footer>
        <!-- Footer end -->


        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <!-- Uncomment below i you want to use a preloader -->
        <!-- <div id="preloader"></div> -->

        <!-- JavaScript Libraries -->
        <script src="{{ asset('front/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('front/vendor/jquery/jquery-migrate.min.js') }}"></script>
        <script src="{{ asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('front/vendor/easing/easing.min.js') }}"></script>
        <script src="{{ asset('front/vendor/stickyjs/sticky.js') }}"></script>
        <script src="{{ asset('front/vendor/superfish/hoverIntent.js') }}"></script>
        <script src="{{ asset('front/vendor/superfish/superfish.min.js') }}"></script>
        <script src="{{ asset('front/vendor/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('front/vendor/touchSwipe/jquery.touchSwipe.min.js') }}"></script>

        <!-- Main Javascript File -->
        <script src="{{ asset('front/js/main.js') }}"></script>
        @yield('script')
    </body>
</html>
