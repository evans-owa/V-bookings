<?php

namespace App\Helpers;

use Illuminate\Auth\Events;
use App\Models\Booked;
use App\Models\Booking;
use App\Mail\TicketMail;

function ticketMail($bookedid){

    // $booked = Booked::where('id', $bookedid)->with('bookedTicket')->first();

    // dd($booked);
}

