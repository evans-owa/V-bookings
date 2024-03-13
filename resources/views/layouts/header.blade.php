<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    {{-- csrf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/bootstrap-custom/css/bootstrap.css">
    <link rel="stylesheet" href="/bootstrap-custom/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/custom.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script>
        $(function() {
            $(".toggle").on("click", function() {

                if ($(".item").hasClass("active")) {
                    $(".item").removeClass("active")
                } else {
                    $(".item").addClass("active")
                }
            })
        });
    </script>
</head>
<body>
    <section class="p-5">
        <nav class="navbar-expand-lg  py-3 fixed-top navbar-brand">
            {{-- bg-dark navbar-dark --}}
            <ul class="menu">
                <li class="logo"><a href="#"><span class="text-warning">V-ticket</span> B</a></li>
                <li class="item"><a href="/">Home</a></li>
                <li class="item"><a href="{{url('movietickets')}}">Events</a></li>
                <li class="item"><a href="{{url('userTickets')}}">MyTickets</a></li>
                @if (Route::has('login'))
                    @auth
                        <li class="btn btn-outline-primary h-2 item"> {{ Auth::user()->name }} </li>
                    @else
                        <li class="item button"><a href="{{ route('login') }}">Login</a></li>
                        @if (Route::has('register'))
                            <li class="item button secondary"><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                @endif
                <li class="toggle"><a href="#"><span class="bars"></span></a></li>
                <li class="item">
                    @if (Route::has('login'))
                        @auth
                            <link align="right" width="48">
                            <section name="content">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                                            this.closest('form').submit();">
                                        {{ __('Exit') }}
                                    </x-dropdown-link>
                                </form>
                            </section>
                            </link>
                        @else
                        @endauth
                    @endif
                </li>
            </ul>
        </nav>
    </section>
</body>


