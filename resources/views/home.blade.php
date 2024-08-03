<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <title>Laravel</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar  navbar-dark navbar-expand-lg bg-primary  ">
        <div class="container flex justify-content-between">
        <a class="navbar-link" href="{{ route('home') }}">
            <img  class="h-32px"  src="{{ url('assets/images/image 1.png')}}" alt="Laracus Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto m-lg-3">
            <li class="nav-item d-block d-lg-none d-xl-block">
                <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="#">Discussions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-nowrap " href="#">About us</a>
            </li>
            </ul>

            <form class="d-flex w-100 me-4 my-2 my-lg-0 ms-auto" role="search" action="#" method="GET">
                <div class="input-group">
                    <span class="input-group-text  bg-white border-end-0" >
                        <img src="{{ url('assets/images/Group 1340.png') }}" alt="">
                    </span>
                    <input class="form-control border-start-0 ps-0" type="search" placeholder="Search" aria-label="Search" name="" value="" >
                </div>
            </form>
            <ul class="navbar-nav ms-auto my-2 my-lg-0" >
                <li class="nav-item my-auto ">
                    <a class="nav-link text-nowrap" href="#">Log in</a>
                </li>
                <li class="nav-item ps-1 pe-0 ">
                    <a class="btn-primary-white" href="#">Singn Up</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <section class="container hero" >
        <div class="row align-items-center h-100" >
            <div class="col-12 col-lg-6   ">
                <h1 class="fw-bold" >The Laravel</br> comunity Developer </h1>
                <p class="mb-4" >Empowering the laravel comunity to connect,share and learn</p>
                <a href="#" class="btn-primary me-2  mb-2 mb-lg-0    " >Sign Up</a>
                <a href="#" class="  btn-secondary me-2 mb-2 mb-lg-0"  >Join Discussions</a>
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
        <a href="#" class="btn-primary me-2  mb-2 mb-lg-0    " >Sign Up</a>
        <a href="#" class="  btn-secondary me-2 mb-2 mb-lg-0"  >Join Discussions</a>
        </div>
    </section>

    <footer class="py-80px" >
        <div class="container">
            <div class="row">
            <div class="col-12 col-lg-6 mb-5 mb-lg-0">
                <img src="{{ url('assets/images/image 3.png') }}" alt="" class="mb-4" >
                <p class="text-white" >Empowering the Laravel community <br/>
                to connect, share and learn.</p>
            </div>
            <div class="col-12 col-lg-6 me-auto" >
                    <div class="d-flex flex-column flex-lg-row justify-content-end " >
                        <div class="d-flex  flex-column me-140px  mb-3  mb-lg-0">
                                <p class="fw-bold fs-5 text-white text-nowrap ">
                                    Contact us
                                </p>
                                <ul class="list-unstyled">
                                    <li class="text-white"><a href="mailto:hi@laracuss.com">hi@laracuss.com</a></li>
                                </ul>
                        </div>
                        <div class="d-flex flex-column" >
                                <p class="fw-bold fs-5 text-white">Links</p>
                                <ul class="list-unstyled">
                                    <li class="text-white mb-2"><a href="#">Home</a></li>
                                    <li class="text-white mb-2  "><a href="#">Discussions</a></li>
                                    <li class="text-white"><a href="#">About Us</a></li>
                                </ul>
                        </div>
                    </div>
            </div>
            </div>
        </div>
    </footer>
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"></script>
</body>
</html>
