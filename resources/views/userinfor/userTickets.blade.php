<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyTickets</title>
</head>
<body>
    @include('layouts.header')

    <section class="checkout my-5">
            {{ csrf_field() }}
            <div class="container mt-5">
                <div class="column">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="middle">Ticket Details</h6>
                                <hr>
                                <table class="table">
                                    <thead class="thead-dark">
                                        <th>Category</th>
                                        <th>Ticket name</th>
                                        <th>Total Price</th>
                                        <th>Ticket number</th>
                                        <th>Quantity</th>
                                        <th>Cover</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($deailedTicket as $sans)
                                            <tr>
                                                <td> {{ $sans->category }}</td>
                                                <td> {{ $sans->tickets->ticket_name }}</td>
                                                <td> {{ $sans->price }}</td>
                                                <td> {{ $sans->ticket_number }}</td>
                                                <td> {{ $sans->quantity}}</td>
                                                <td>
                                                    <img src="{{asset('assets/img/tickets/' .$sans->tickets->image) }}"
                                                        alt="Ticket" width="50">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h6>Booked Details</h6>
                                <hr>
                                <table class="table">
                                    <thead>
                                        <th>seatnumber</th>
                                        <th>Your Email</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($userTicket as $cutom)
                                            <tr>
                                                <td> {{ $cutom->seatnumber}}</td>
                                                <td> {{ $cutom->useremail}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')
</body>
</html>
