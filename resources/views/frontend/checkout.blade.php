<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
</head>

<body>
    @include('layouts.header')

    <section class="bg-dark text-light p-3 p-lg-0 pt-lg-5 text-center text-sm-start">
        <div class="container">
            <div class="d-lg-flex align-items-center justify-content-between">
                <div>
                    <h6 class="heading">
                        <a href="/"> home </a>/
                        <a href="{{ url('movietickets') }}">Events</a>/
                        @foreach ($ticket  as $header )
                        {{$header->ticketname}} /checkout
                        @endforeach
                    </h6>
                </div>
            </div>
        </div>
    </section>
    <section class="checkout py-2">
        <form action="{{ url('/book_ticket') }}" method="POST">
            {{ csrf_field() }}
            <div class="container mt-5">
                <div class="row finalize-ticket">
                    <div class="col-md-10 notification">
                        <div class="card">
                            <div class="card-body">
                                <h6>Notification</h6>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <label for="email">Notification mail</label>
                                        <input type="email" class="form-control" value="{{ Auth::user()->email }}" va
                                            placeholder="Notification email" name="email" required='@'>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 pt-3 final-ticket">
                        <div class="card">
                            <div class="card-body">
                                @php $total = 0; @endphp
                                <h6>Ticket Details</h6>

                                <hr>
                                <table class="table">
                                    <thead>
                                        <th>Ticket name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>quantity</th>
                                        <th>Venue</th>
                                        <th>Cover</th>

                                    </thead>
                                    <tbody>
                                        @foreach ($ticket as $finalticket)
                                            @php $total = $finalticket->tickets->price * $finalticket->quantity  ; @endphp
                                            <tr>
                                                <td>{{ $finalticket->ticketname }}</td>
                                                <td>{{ $finalticket->tickets->category }}</td>
                                                <td><input type="text" value="{{ $total }}"
                                                        class="form-control" name="total" style="width: 100px"></td>
                                                <td>{{ $finalticket->quantity }}</td>
                                                <td>{{ $finalticket->tickets->location }}</td>
                                                <td>
                                                    <img src="{{ asset('/assets/img/tickets/' . $finalticket->tickets->image) }}"
                                                        alt="ticket" height="50">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <button type="submit" class="btn  float-end"> Book </button>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
        </div>
    </section>
    @include('layouts.footer')
</body>

</html>
