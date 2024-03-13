<?php

namespace App\Http\Controllers;

use App\Models\Booked;
use App\Models\Booking;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\Wait;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketBooked;

class CheckoutController extends Controller
{
    public function finalizeTicket()
    {
        // verify ticket availability
        $verify_ticket = Wait::where('userid', Auth::id())->get();
        foreach($verify_ticket as $waitTickets)
        {
            if (!Ticket::where('id', $waitTickets->ticketid)->where('quantity', '>=', $waitTickets->quantity)->exists())
            {
                $removeTicket = Wait::where('userid', Auth::id())->where('ticketid', $waitTickets->ticketid)->first();
                $removeTicket->delete();
            }
        }


        $ticket = Wait::where('userid', Auth::id())->get();

        return view('frontend.checkout', compact('ticket'));
    }

    public function ticket_Booked(Request $request){

        $booked = new Booked();
        $booked->userid = Auth::id();
        $booked->useremail = $request->input('email');
        $booked->seatnumber = 'seatnumber'.rand(001,300);
        $booked->save();
        session()->forget('ticket_Booked');

        $ticket = Wait::where('userid', Auth::id())->get();
        foreach ($ticket as $bookedTicket){

            Booking::create([
                'bookedid'=> $booked->id,
                'ticket_id'=> $bookedTicket->ticketid,
                'userid'=> Auth::id(),
                'category' => $bookedTicket->tickets->category,
                'price' => $request->input('total'),
                'ticket_number' => 'V-ticket-No.'. rand(0200 , 8888),
                'quantity' => $bookedTicket->quantity,
            ]);

            $ticketreduce = Ticket::where('id', $bookedTicket->ticketid)->first();
            $ticketreduce->quantity = $ticketreduce->quantity - $bookedTicket->quantity;
            $ticketreduce->update();

        }

        $this->sendTicketBookingConfirmation($booked);

        $waitTickets = Wait::where('userid', Auth::id())->get();
        Wait::destroy($waitTickets);

        return redirect('/')->with('status', "Booked succefull check you mail");

    }

    public function sendTicketBookingConfirmation($booked)
    {
        Mail::to($booked->useremail)->send(new TicketBooked($booked));
    }
}
