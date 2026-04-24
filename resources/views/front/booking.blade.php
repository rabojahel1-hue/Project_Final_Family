@extends('front.parent')

@section('tilte','Family_Doctor | Booking')

@section('content')

        <main id="main">

            <!-- Booking Section Start -->
            <section id="booking">
                <div class="container">
                    <div class="section-header">
                        <h3>Book for Getting Services</h3>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="booking-form">
                                <form>
                                    <div class="form-row">
                                        <div class="control-group col-sm-6">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" placeholder="E.g. John Sina" required="required" />
                                        </div>
                                        <div class="control-group col-sm-6">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="E.g. email@example.com" required="required" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="control-group col-sm-6">
                                            <label>Mobile</label>
                                            <input type="text" class="form-control" placeholder="E.g. +1 234 567 8900" required="required" />
                                        </div>
                                        <div class="control-group col-sm-6">
                                            <label>Select a Service</label>
                                            <select class="custom-select">
                                                <option value="">Consultation</option>
                                                <option>Health Checkup</option>
                                                <option>Flu Shots</option>
                                                <option>Blood Test</option>
                                                <option>Physical Exams</option>
                                                <option>Prevention</option>
                                                <option>Family Planning</option>
                                                <option>Home Visits</option>
                                                <option>Insurance</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="control-group col-sm-6">
                                            <label>Appointment Date</label>
                                            <input type="text" class="form-control datetimepicker-input" id="date" data-toggle="datetimepicker" data-target="#date" placeholder="E.g. MM/DD/YYYY" required="required" />
                                        </div>
                                        <div class="control-group col-sm-6">
                                            <label>Appointment Time</label>
                                            <input type="text" class="form-control datetimepicker-input" id="time" data-toggle="datetimepicker" data-target="#time" placeholder="E.g. HH:MM AM" required="required" />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label>Special Request</label>
                                        <input type="text" class="form-control" placeholder="E.g. Special Request" required="required" />
                                    </div>
                                    <div class="button"><button type="submit">Book Now</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Booking Section End -->

        </main>
@endsection
