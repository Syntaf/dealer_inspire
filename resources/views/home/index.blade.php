@extends('layouts.app')

@section('endofbody')
    <script>
        new FormController('#contact-form')
    </script>
@endsection

@section('content')
    <!-- Intro Header -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">Challenge</h1>
                        <p class="intro-text">Code Something Awesome.
                            <br>We &lt;3 PHP Developers.</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About This Challenge</h2>
                <p>We make awesome things at Dealer Inspire.  We'd like you to join us.  That's why we made this page.  Are you ready to join the team?</p>
                <p>To take the code challenge, visit <a href="https://bitbucket.org/dealerinspire/php-contact-form">this Git Repo</a> to clone it and start your work.</p>
            </div>
        </div>
    </section>

    <section id="coffee" class="content-section text-center">
        <div class="download-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Coffee Break?</h2>
                    <p>Take a coffee break.  You deserve it.</p>
                    <a href="https://www.youtube.com/dealerinspire" class="btn btn-default btn-lg">or Watch YouTube</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact Guy Smiley</h2>
                <p>Remember Guy Smiley?  Yeah, he wants to hear from you.</p>
                <div class="card">
                    <form method="POST" id="contact-form" action="/inquiry">
                        @csrf

                        <div class="col-xs-12 input-group" data-role="full_name">
                            <label for="full_name" class="pull-left">Full Name<sup class="text-danger">*</sup></label>
                            <input type="text" name="full_name" class="form-control" />
                        </div>
                        <div class="col-xs-12 input-group" data-role="email">
                            <label for="email" class="pull-left">Email Address<sup class="text-danger">*</sup></label>
                            <input type="email" name="email" class="form-control" />
                        </div>
                        <div class="col-xs-12 input-group" data-role="phone_number">
                            <label for="phone" class="pull-left">Phone Number</label>
                            <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="000-000-0000" name="phone_number" class="form-control" />
                        </div>
                        <div class="col-xs-12 text-area input-group" data-role="message">
                            <label for="message" class="pull-left">Message<sup class="text-danger">*</sup></label>
                            <textarea class="form-control" name="message" rows="3" placeholder="message"></textarea>
                        </div>

                        <input class="btn btn-primary" type="submit" value="Submit">

                        <p class="response-label" data-role="response"></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <div id="map"></div>
@endsection