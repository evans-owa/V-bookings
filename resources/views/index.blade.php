<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>V-tickets</title>

</head>

<body>
    @include('layouts.header')

<section class="cover">
    <div id="carouselExampleCaption" class="c" data-bs-ride="carousel" >
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="slide-1"
            ></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" class="active" aria-current="true" aria-label="slide-2"
            ></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" class="active" aria-current="true" aria-label="slide-3"
            ></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('/assets/img/culture.jpeg')}}" alt="event" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Cultural Events</h5>
                    <p>Book earlier for you cultural event</p>
                    <a href="{{url('movietickets')}}" class="btn btn-light mt-3">
                        <i class="bi bi-chevron-right">Checkout</i>
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('/assets/img/event4.jpeg')}}" alt="event" class="d-block ">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Movies</h5>
                    <p>Rerserve you seat earler for the great spot</p>
                    <a href="{{url('movietickets')}}" class="btn btn-light mt-3">
                        <i class="bi bi-chevron-right">Checkout</i>
                    </a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('/assets/img/campus talk.jpeg')}}" alt="event" class="d-block w-100">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Great talks</h5>
                    <p>Join the campus students for some great talks</p>
                    <a href="{{url('movietickets')}}" class="btn btn-light mt-3">
                        <i class="bi bi-chevron-right">Checkout</i>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start mt-10">
        <div class="container">
            <div class="d-lg-flex align-items-center justify-content-between">
                <div>
                    <h1>Have a
                        <span class="text-info"> Self Drive  </span> for personal benefit
                    </h1>
                    <p class="lead my-4">
                        Choose the best Event from us to keep your days moving smoothly
                        <span>Be entertaine, </span>
                        <span>Taught , Adviced</span>
                    </p>
                    <a href="{{url('movietickets')}}" class="btn btn-outline-primary btn-lg m-4">Events</a>
                </div>
                <img src="{{asset('/assets/img/selfdriving.jpg')}}" class="rounded float-left" alt="movie" width="400" height="200">
            </div>
</section>

    <!--boxes-->
    <section class="p-5">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <img src="{{asset('/assets/img/selfdriving.jpg')}}" class="rounded float-left" alt="movie" width="400" height="400">
                            <div class="h1 mb-3">
                            </div>
                            <h3 class="card-title mb-">
                              Self Drive
                            </h3>
                            <p class="card-text">
                                enjoy a self dive with a driveless car
                            </p>
                            <a href="{{url('movietickets')}}" class="btn btn-primary">Find More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-secondary text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="{{asset('/assets/img/jaz.jpg')}}" class="rounded float-left" alt="movie" width="400" height="400">
                            </div>
                            <h3 class="card-title mb-3">
                                Jazz Week
                            </h3>
                            <p class="card-text">
                                listen to live music by your best artis
                            </p>
                            <a href="{{url('movietickets')}}" class="btn btn-dark">Find More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="{{asset('/assets/img/davidocover.jpg')}}" class="rounded float-left" alt="movie" width="400" height="400">
                            </div>
                            <h3 class="card-title mb-3">
                                Afro beats week
                            </h3>
                            <p class="card-text">
                                pick the best concert that siutes you
                            </p>
                            <a href="{{url('movietickets')}}" class="btn btn-primary">Find More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-secondary text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="{{asset('/assets/img/jaz.jpg')}}" class="rounded float-left" alt="movie" width="400" height="400">
                            </div>
                            <h3 class="card-title mb-3">
                                Jazz Week
                            </h3>
                            <p class="card-text">
                                listen to live music by your best artis
                            </p>
                            <a href="{{url('movietickets')}}" class="btn btn-dark">Find More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="know" class="p-5">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md">
                <img src="{{asset('/assets/img/davidocover.jpg')}}" class="rounded float-left" alt="movie" width="400" height="400">
                </div>
                <div class="col-md p-5">
                    <h3>outcounrty Coming event</h3>
                    <p class="know">
                        Having a solid booking sector and what motivates you
                    </p>
                    <p>
                       on behalf of a all events we care about you outside c
                    </p>
                    <a href="{{url('movietickets')}}" class="btn btn-light mt-3">
                        <i class="bi bi-chevron-right">Read More</i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="p-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-md">
                    <h2 class="text-center md-4">
                        Reach out for ucoming events
                    </h2>
                    <ul class="list-group list-group-flush lead">
                        <li class="list-group-item">
                            <span class="fw-bold">Main Location:</span>
                            3 Garrissa Road Thika,Kiambu st Mwalimu Avenue
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">V tickets:</span>
                            v-ticket  organization
                        </li>
                        <li class="list-group-item">
                            <span class="fw-bold">Call number:</span>
                            +2547408005
                        </li>

                        <li class="list-group-item">
                            <span class="fw-bold">Email:</span>
                            V-ticket@mail.com
                        </li>
                    </ul>
                </div>
                <div class="col-md">
                    <div id="map">
                        <img src="{{('/assets/img/event.webp')}}" class="rounded float-left" alt="movie" width="600" height="400">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>
@include('layouts.footer')

</html>
