<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class CustomerController extends Controller
{
    public function customer_veiwticket(){

        $customerTicket = Ticket::all();
        return view('frontend.movietickets', compact('customerTicket'));

    }
}
