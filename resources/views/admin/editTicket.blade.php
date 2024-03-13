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
            <h2> <span class="lab la-vimeo"></span> <span>V-ticket B {{ Auth::user()->name }}</span> </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ url('admin/dashboard') }}"><span class="las la-igloo"></span>
                        <span>Dashbored</span>
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
                        <h4>{{ Auth::user()->name }} </h4>
                        <small>Super Admin</small>
                    </div>
                </div>
            </div>
        </header>
        {{-- header end --}}
        <main>
            {{-- edit tickets --}}

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
                <form action="{{ url('edit_ticket/'.$editticket->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="ticket-details">
                        <div class="input-box">
                            <span class="details">Ticket Name</span>
                            <input type="text" value="{{$editticket->ticket_name}}" name="ticket_name" id="" placeholder="Enter ticket title"
                                required>
                        </div>
                        <div class="input-box">
                            <span class="details">Category</span>
                                <select class="form-select" name='category' aria-label="Default select example"  required>
                                    <option  value="{{$editticket->category}}" >{{$editticket->category}}</option>
                                    <option value="Regular"> Regular</option>
                                    <option value="VIP"> VIP </option>
                                </select>
                        </div>
                        <div class="input-box">
                            <span class="details">Price</span>
                            <input type="number" value="{{$editticket->price}}" name="price" id="" placeholder="Enter ticket price"
                                required>
                        </div>
                        <div class="input-box">
                            <span class="details">Location</span>
                            <input type="text" value="{{$editticket->location}}" name="location" id="" placeholder="Enter Event location"
                                required>
                        </div>
                        <div class="input-box">
                            <span class="details">Description</span>
                            <input type="text" name="description" id="" value="{{$editticket->description}}"
                                placeholder="Enter ticket description" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Image</span>
                            @if($editticket->image)
                            <img src="{{asset('assets/img/tickets/' .$editticket->image) }}" alt="product" width="200" height="200">
                            <input class="input-box" value="{{('assets/img/tickets/' .$editticket->image) }}" type="file" name="image" id="" placeholder="Enter ticket image"
                                required>
                            @endif

                        </div>
                        <div class="input-box">
                            <span class="details">Quantity</span>
                            <input min="0" type="number" name="quantity" id="" value="{{$editticket->quantity}}" placeholder="Enter ticket quantity"
                                required>
                        </div> <div class="input-box">
                            <span class="details">Date of Event</span>
                            <input type="date" name="event_date" id="" value="{{$editticket->event_date}}" placeholder=""
                                required>
                        </div>
                    </div>
                    <div class="button">
                        <button type="submit" class="" value="submit">Update Ticket</button>
                    </div>
                </form>
            </div>
            {{-- end edit tickets --}}
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
