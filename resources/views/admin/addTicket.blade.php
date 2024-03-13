<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title> V-ticket B</title>

    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    <link rel= "stylesheet"
        href= "https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
<body>
    <input type="checkbox" id="nav-toggle" />
    {{-- side bar --}}
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2> <span class="lab la-vimeo"></span> <span>V-ticket B /span> </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ url('admin/dashboard') }}"><span class="las la-igloo"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('#') }}" class="active"><span class="lab la-dashcube"></span>
                        <span>Tickets</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    {{-- end of side bar --}}

    <div class="main-content">
        {{-- heade start --}}
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
                        <h4>Admin</h4>
                        <small>Super Admin</small>
                    </div>
                </div>
            </div>
        </header>
        {{-- header end --}}
        <main>
            {{-- add tickets --}}

            <div class="container">
                <div class="title">Add tickets</div>

                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                <form action="{{ url('/add_ticket') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="ticket-details">
                        <div class="input-box">
                            <span class="details">Ticket Name</span>
                            <input type="text" name="ticket_name" id="" placeholder="Enter ticket title"
                                required>
                        </div>
                        <div class="input-box">
                            <span class="details">Category</span>
                                <select class="form-select" name='category' aria-label="Default select example"  required>
                                    <option  value="" >Select Category</option>
                                    <option value="Regular"> Regular </option>
                                    <option value="VIP"> VIP </option>
                                </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Price</span>
                            <input min="1" type="number" name="price" id="" placeholder="Enter ticket price"
                                required>
                        </div>
                        <div class="input-box">
                            <span class="details">Location</span>
                            <input type="text" name="location" id="" placeholder="Enter Event location"
                                required>
                        </div>
                        <div class="input-box">
                            <span class="details">Description</span>
                            <input type="text" name="description" id=""
                                placeholder="Enter ticket description" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Image</span>
                            <input class="input-box" type="file" name="image" id="" placeholder="Enter ticket image"
                                required>
                        </div>
                        <div class="input-box">
                            <span class="details">Quantity</span>
                            <input min="1" type="number" name="quantity" id="" placeholder="Enter ticket quantity"
                                required>
                        </div> <div class="input-box">
                            <span class="details">Date of Event</span>
                            <input type="date" name="event_date" id="" placeholder=""
                                required>
                        </div>
                    </div>
                    <div class="button">
                        <button type="submit" class="" value="submit">Add Ticket</button>
                    </div>
                </form>
            </div>
            {{-- end add tickets --}}

            {{-- tickets --}}
            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Tickets</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr>
                                            <td>Ticket Id</td>
                                            <td>Ticket Name</td>
                                            <td>Category</td>
                                            <td>Price</td>
                                            <td>Location</td>
                                            <td>Description</td>
                                            <td>Quantity</td>
                                            <td>Event date</td>
                                            <td>Image</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($adminTicket as $ticket)
                                            <tr>
                                                <td>{{ $ticket->id }}</td>
                                                <td>{{ $ticket->ticket_name }}</td>
                                                <td>{{ $ticket->category }}</td>
                                                <td>{{ $ticket->price }}</td>
                                                <td>{{ $ticket->location }}</td>
                                                <td>{{ $ticket->description }}</td>
                                                <td>{{ $ticket->quantity }}</td>
                                                <td>{{ $ticket->event_date }}</td>
                                                <td>
                                                    <img src="{{asset('assets/img/tickets/' .$ticket->image) }}"
                                                        alt="ticket" width="100">
                                                </td>
                                                <td>
                                                    <div class="card-header">
                                                        <button> <a href="{{ url('admin/editTicket/'.$ticket->id) }}"class="">Edit</a></button>
                                                        <button> <a href="{{ url('delete_ticket/'.$ticket->id) }}"class="">Delete</a></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- added ticket history --}}
        </main>
    </div>
</body>
</head>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session('status'))
    <script>
        swal("Good job!", "{{ session('status') }}", "success");
    </script>
@endif

</html>
