    @extends('layouts.app')

    @section('body')
    <section class="container hero" >
        <div class="row align-items-center h-100" >
            <div class="col-12 col-lg-6   ">
                <h1 class="fw-bold" >The Laravel</br> comunity Developer </h1>
                <p class="mb-4" >Empowering the laravel comunity to connect,share and learn</p>
                <a href="{{ route('auth.sign-up.show') }}" class="btn-primary me-2  mb-2 mb-lg-0    " >Sign Up</a>
                <a href="{{ route('discussions.index') }}" class="  btn-secondary me-2 mb-2 mb-lg-0"  >Join Discussions</a>
            </div>
            <div class="col-12 col-lg-6  h-315  order-first order-lg-last mb-3 mb-lg-0 " >
                <img class="hero-image float-lg-end"  src="{{ url('assets/images/Mask group.png') }}" alt="">
            </div>
        </div>
    </section>
    <section class="container min-h-372px" >
        <div class="row">

            <div class="col-12 col-lg-4  text-center">
                <img class="promote-icon mb-2" src="{{ url('assets/images/discussions.png') }}" alt="Discussions">
                <h2>Discussions</h2>
                <p class="fs-3" >51.875</p>
            </div>

            <div class="col-12 col-lg-4  text-center">
                <img class="promote-icon mb-2" src="{{ url('assets/images/answers.png') }}" alt="Discussions">
                <h2>Answers</h2>
                <p class="fs-3" >121.984</p>
            </div>

            <div class="col-12 col-lg-4  text-center">
                <img class="promote-icon mb-2" src="{{ url('assets/images/users.png') }}" alt="Discussions">
                <h2>Users</h2>
                <p class="fs-3" >11.675</p>
            </div>
        </div>
    </section>
    <section class="bg-gray">
        <div class="container py-80px">
        <h2 class="text-center mb-5  fw-bold ">Help Others</h2>
        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
            <div class="card">
                <a href="#">
                <h3>How to add a custom validation in laravel?</h3>
                </a>
                <div>
                <p class="mb-5">
                    I am working on a blogging application in Laravel 8. There are 4 user roles, among which, the "...
                </p>
                <div class="row">
                    <div class="col me-1 me-lg-2">
                    <a href="#"><span class="badge rounded-pill text-bg-light">Eloquent</span></a>
                    </div>
                    <div class="col-5 col-lg-7">
                    <div class="avatar-sm-wrapper d-inline-block">
                        <a href="#" class="me-1">
                        <img src="{{ url('assets/images/Ellipse 2.png') }}" class="avatar rounded-circle" alt="">
                        </a>
                    </div>
                    <span class="fs-12px">
                        <a href="#" class="me-1 fw-bold">Iklil</a>
                        <span class="color-gray">7 hours ago</span>
                    </span>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-12 col-lg-4 mb-3">
            <div class="card">
                <a href="#">
                <h3>How to add a custom validation in laravel?</h3>
                </a>
                <div>
                <p class="mb-5">
                    I am working on a blogging application in Laravel 8. There are 4 user roles, among which, the "...
                </p>
                <div class="row">
                    <div class="col me-1 me-lg-2">
                    <a href="#"><span class="badge rounded-pill text-bg-light">Eloquent</span></a>
                    </div>
                    <div class="col-5 col-lg-7">
                    <div class="avatar-sm-wrapper d-inline-block">
                        <a href="#" class="me-1">
                        <img src="{{ url('assets/images/Ellipse 2.png') }}" class="avatar rounded-circle" alt="">
                        </a>
                    </div>
                    <span class="fs-12px">
                        <a href="#" class="me-1 fw-bold">Iklil</a>
                        <span class="color-gray">7 hours ago</span>
                    </span>
                    </div>
                </div>
                </div>
            </div>
            </div>
            <div class="col-12 col-lg-4 mb-3">
            <div class="card">
                <a href="#">
                <h3>How to add a custom validation in laravel?</h3>
                </a>
                <div>
                <p class="mb-5">
                    I am working on a blogging application in Laravel 8. There are 4 user roles, among which, the "...
                </p>
                <div class="row">
                    <div class="col me-1 me-lg-2">
                    <a href="#"><span class="badge rounded-pill text-bg-light">Eloquent</span></a>
                    </div>
                    <div class="col-5 col-lg-7">
                    <div class="avatar-sm-wrapper d-inline-block">
                        <a href="#" class="me-1">
                        <img src="{{ url('assets/images/Ellipse 2.png') }}" class="avatar rounded-circle" alt="">
                        </a>
                    </div>
                    <span class="fs-12px">
                        <a href="#" class="me-1 fw-bold">Iklil</a>
                        <span class="color-gray">7 hours ago</span>
                    </span>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <section class="container  min-h-372px d-flex  flex-column align-items-center justify-content-center"  >
        <h2 class="fw-bold" >Ready to contribute</h2>
        <p class="mb-4" >Want to make a good impact</p>
        <div class="text-center" >
        <a href="{{ route('auth.sign-up.show') }}" class="btn-primary me-2  mb-2 mb-lg-0    " >Sign Up</a>
        <a href="{{ route('discussions.index') }}" class="  btn-secondary me-2 mb-2 mb-lg-0"  >Join Discussions</a>
        </div>
    </section>
    @endsection
