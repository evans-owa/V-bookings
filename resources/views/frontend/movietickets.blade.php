<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tickets</title>
</head>

<body>
    @include('layouts.header')

    <section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start mt-10">
        <div class="container">
            <div class="d-lg-flex align-items-center justify-content-between">
                <div>
                    <h6 class="heading" >
                      <a href="/"> home </a>/
                       <a href="{{url('movietickets')}}">Events</a>
                    </h6>
                </div>
            </div>
        </div>
</section>
    <section class="pt-5">
        <div class="ticket-container">
            @foreach ($customerTicket as $ticket)
                <div class="card">
                    <a href="{{(url('singleEventView/'.$ticket->id))}}">
                        <div class="category">{{$ticket->category}}</div>
                        <img src="{{asset('assets/img/tickets/' .$ticket->image) }}" alt="EventPic">
                        <h2 class="title mt-2">{{$ticket->ticket_name}}</h2>
                        <div class="infor mt-0">
                            <div class="price"><span></span> {{$ticket->price}}</div>
                            <div class="duration">
                                <div class="unit">{{$ticket->event_date}}</div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    @include('layouts.footer')
</body>

</html>
