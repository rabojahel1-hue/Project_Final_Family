@extends('front.parent')

@section('tilte','Family_Doctor | Service')

 @section('content')

        <main id="main">

            <!-- Services Section Start -->
            <section id="services">
                <div class="container">
                    <header class="section-header">
                        <h3>Services</h3>
                    </header>
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="single-service">
                                <div class="icon icon-1"></div>
                                <h4>Consultation</h4>
                                <span>20 Min | $50.00</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                <a href="{{ route('front.booking') }}">Book Now</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="single-service">
                                <div class="icon icon-2"></div>
                                <h4>Health Checkup</h4>
                                <span>30 Min | $30.00</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                <a href="{{ route('front.booking') }}">Book Now</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="single-service">
                                <div class="icon icon-3"></div>
                                <h4>Flu Shots</h4>
                                <span>10 Min | $15.00</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                <a href="{{ route('front.booking') }}">Book Now</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="single-service">
                                <div class="icon icon-4"></div>
                                <h4>Blood Test</h4>
                                <span>30 Min | $10.00</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                <a href="{{ route('front.booking') }}">Book Now</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="single-service">
                                <div class="icon icon-5"></div>
                                <h4>Physical Exams</h4>
                                <span>30 Min | $50.00</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                <a href="{{ route('front.booking') }}">Book Now</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="single-service">
                                <div class="icon icon-6"></div>
                                <h4>Prevention</h4>
                                <span>10 Min | $20.00</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                <a href="{{ route('front.booking') }}l">Book Now</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="single-service">
                                <div class="icon icon-7"></div>
                                <h4>Family Planning</h4>
                                <span>30 Min | $20.00</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                <a href="{{ route('front.booking') }}">Book Now</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="single-service">
                                <div class="icon icon-8"></div>
                                <h4>Home Visits</h4>
                                <span>30 Min | $30.00</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                <a href="{{ route('front.booking') }}">Book Now</a>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 d-sm-none d-md-block d-lg-none">
                            <div class="single-service">
                                <div class="icon icon-9"></div>
                                <h4>Insurance</h4>
                                <span>10 Min | $100.00</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                <a href="{{ route('front.booking') }}">Book Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Service Section End-->

        </main>
@endsection
