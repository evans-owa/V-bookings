<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $detailedView->ticket_name }}</title>
</head>

<body>
    @include('layouts.header')
    <section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start mt-10">
        <div class="container">
            <div class="d-lg-flex align-items-center justify-content-between">
                <div>
                    <h6 class="heading" >
                      <a href="/"> home </a>/
                       <a href="{{url('movietickets')}}">Events</a>/
                       {{ $detailedView->ticket_name }}
                    </h6>

                </div>
            </div>
        </div>
</section>
    <section id="detailedId" class="p-2">
        <div class="container ticket_data">
            <div class="row align-items-center ">
                <div class="col-md">
                    <img src="{{ asset('/assets/img/tickets/' . $detailedView->image) }}" class="rounded float-right"
                        alt="Event Cover" height="450">
                </div>
                <div class="col-md p-5">
                    <input type="hidden" value="{{ $detailedView->id }}" class="ticket_id">
                    <h1><span class="text-warning">Title: </span> {{ $detailedView->ticket_name }}</h1>
                    <input type="hidden" value="{{ $detailedView->ticket_name }}" class="ticketname">
                    <p class="description"><span class="text-warning">Description: </span>
                        {{ $detailedView->description }}
                    </p>
                    <h4><span class="text-warning">Type: </span> {{ $detailedView->category }}</h4>
                    <p>
                        <span class="text-primary"> <i class="bi bi-geo-alt"></i></span>
                        {{ $detailedView->location }}
                    </p>
                    <p><span class="text-primary"><i class="bi bi-calendar2-week"> </i> </span>
                        {{ $detailedView->event_date }} </p>
                    @if ($detailedView->quantity > 0)
                        <label class="badge bg-success">Spaces Available</label>
                    @else
                        <label class="badge bg-danger">Full Booked</label>
                    @endif
                    <h6>Tickets avialble: {{ $detailedView->quantity }} </h6>

                    <h5> <span> ksh. </span> {{ $detailedView->price }}</h5>
                    <div class="input-box pb-3">
                        <span class="details">Seat numbers</span>
                        <select class="form-select quantity" name='' aria-label="Default select example"
                            required>
                            <option value="1">select attendies</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    @if ($detailedView->quantity > 0)
                        <button class="submit btn btn-light addToWait mt-3"> <i
                            class="bi bi-chevron-right"></i>Book</button>
                    @endif
                </div>
                @if ($detailedView->quantity > 0)
                <a href="{{ url('frontend/wait') }}" class="btn btn-light mt-3">
                    <i class="bi bi-chevron-right">Proceed</i>
                </a>
                @endif
            </div>
        </div>
    </section>

    <script src="/jquery.js"></script>

    <script>
        $('.addToWait').click(function(e) {
            e.preventDefault();
            var ticket_id = $(this).closest('.ticket_data').find('.ticket_id').val();
            var ticketname = $(this).closest('.ticket_data').find('.ticketname').val();
            var ticket_quantity = $(this).closest('.ticket_data').find('.quantity').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/add-to-wait",
                data: {
                    'ticektId': ticket_id,
                    'ticketname': ticketname,
                    'ticket_quantity': ticket_quantity,
                },
                success: function(response) {

                    swal(response.status);
                }
            });

        });
    </script>

    @include('layouts.footer')
</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session('status'))
    <script>
        swal("Good job!", "{{ session('status') }}", "success");
    </script>
@endif

</html>
