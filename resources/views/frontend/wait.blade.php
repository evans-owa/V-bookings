<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wait</title>
</head>

<body>
    @include('layouts.header')

    <section id="detailedId" class="p-2">
        <div class="card shadow ticket_data my-5">
            {{-- <h3 class="text-center">Holding is empty</h3> --}}
            <div class="card-body">
                @php $total = 0; @endphp
                @foreach ($waitItem as $item)
                    <div class="row">
                        <div class="col-md-1 ">
                            <img src="{{ asset('/assets/img/tickets/' . $item->tickets->image) }}" alt="tickets"
                                height="100">
                        </div>
                        <div class="col-md-2 my-4">
                            <h3>{{ $item->ticketname }}</h3>
                            <input type="hidden" class="ticketname">
                        </div>
                        <div class="col-md-2 my-4">
                            <h3> Ksh {{ $item->tickets->price }}</h3>
                            <input type="hidden" class="ticketname">
                        </div>
                        <div class="col-md-2 my-4">
                            <h4> {{ $item->tickets->category }}</h4>
                            <input type="hidden" class="ticketname">
                        </div>

                        <div class="col-md-2 my-4 data">
                            <input type="hidden" value="{{ $item->ticketid }}" class="ticket_id">
                            @if ($item->tickets->quantity >= $item->quantity)
                                <div class="input-group text-center mb-3" style="width: 130px">
                                    <input max="5" min="1" type="number" name="quantity"
                                        class="form-control ticket-seats text-center" value="{{ $item->quantity }}">
                                </div>
                                @php $total += $item->tickets->price * $item->quantity  ; @endphp
                                @else
                                <h6 class="text-danger">Fully Booked</h6>
                            @endif
                        </div>
                        <div class="col-md-3 my-4">
                            <a href="{{ url('delete-wait-item/' . $item->id) }}" class="btn"><i
                                    class="bi bi-trash"></i> </a>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="card-footer">
                Total Price : Ksh {{ $total }} <a href="{{ url('checkout') }}"
                    class="btn btn-outline-primary text-secondary float-end"> Finalize </a>
            </div>
        </div>
    </section>
    @include('layouts.footer')
</body>

</html>
