@extends('front.parent')

@section('tilte','Family_Doctor | About')

@section('content')

        <main id="main">

            <!-- About Section Start-->
            <section id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="about-col-left">
                                <img class="img-fluid" src="{{ asset('front/img/about-us.jpg') }}" />
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-6">
                            <div class="about-col-right">
                                <header class="section-header">
                                    <h3>About Dr. Johnson</h3>
                                </header>
                                <ul class="icon">
                                    <li><a href="#" class="fa fa-twitter"></a></li>
                                    <li><a href="#" class="fa fa-facebook"></a></li>
                                    <li><a href="#" class="fa fa-pinterest"></a></li>
                                    <li><a href="#" class="fa fa-google-plus"></a></li>
                                </ul>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam convallis quam sed tincidunt accumsan. Aliquam at tincidunt tortor, ac porta turpis. Curabitur lacinia venenatis semper.
                                </p>
                                <p>
                                    Aliquam ut nibh ut lacus posuere facilisis. Vestibulum ullamcorper arcu et bibendum ultrices. Suspendisse rutrum turpis vitae.
                                </p>
                                <a href="{{ route('front.about') }}">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="about-col">
                                <h4>Education</h4>
                                <p>Medical School - University of Dulton Health Science Center.</p>
                                <p>Residency in Family Medicine - University of Dulton Health Science Center.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-col">
                                <h4>Experience</h4>
                                <p>Medical School - University of Dulton Health Science Center.</p>
                                <p>Residency in Family Medicine - University of Dulton Health Science Center.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About Section End-->
        </main>
@endsection
