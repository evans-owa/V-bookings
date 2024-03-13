
<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title>V-ticket B</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel= "stylesheet"
        href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2> <span class="lab la-vimeo"></span> <span>V-ticket B {{ Auth::user()->name }}</span> </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="#" class="active"><span class="las la-igloo"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/addTicket') }}"><span class="lab la-dashcube"></span>
                        <span>Tickets</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <div class="header-title">
                <h2>
                    <label for="nav-toggle">
                        <span class="las la-bars"></span>

                    </label> Dashboard
                </h2>
                <div class="search-wrapper">
                    <span class="las la-search"></span>
                    <input type="search" placeholder="search here" />
                </div>

                <div class="user-wrapper">
                    <img src="{{ asset('assets/img/event.webp') }}" width="30px" height="30px"
                        alt="profile">
                    <div>
                        <h4>{{ Auth::user()->name }} </h4>
                        <small>Admin</small>
                        <li align="right" width="48">
                            <section name="content">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </section>
                        </li>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>4</h1>
                        <span>Brands</span>
                    </div>
                    <div>
                        <span class="lab la-accusoft"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>10</h1>
                        <span>Projects</span>
                    </div>
                    <div>
                        <span class="las la-snowflake"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>55%</h1>
                        <span>Recognition</span>
                    </div>
                    <div>
                        <span class="las la-images"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1> 20k</h1>
                        <span>Income</span>
                    </div>
                    <div>
                        <span class="las la-money-bill"></span>
                    </div>
                </div>
            </div>
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Bookings</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Ticket name</td>
                                            <td>Category</td>
                                            <td>price</td>
                                            <td>ticket number</td>
                                            <td>quantity</td>
                                            <td>Venue</td>
                                        </tr>
                                    </thead>
                                    @foreach ($adminBooking as $bookedtickets)
                                        <tbody>
                                            <tr>
                                                <td>{{ $bookedtickets->tickets->ticket_name }}</td>
                                                <td>{{ $bookedtickets->category }}</td>
                                                <td>{{ $bookedtickets->price }}</td>
                                                <td>{{ $bookedtickets->ticket_number }}</td>
                                                <td>{{ $bookedtickets->quantity }}</td>
                                                <td>{{ $bookedtickets->tickets->location}}</td>
                                            </tr>
                                        </tbody>
                                    @endforeach

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</body>
{{-- @include('layouts.footer') --}}
</head>

</html>

</body>

</html>
