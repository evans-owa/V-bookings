<?php

namespace App\Http\Controllers;

use App\Models\Booked;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Wait;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function detail_ticket($id){
        if(Ticket::where('id', $id)->exists()){
            $detailedView = Ticket::where('id', $id)->first();
        return view('frontend.singleEventView', compact('detailedView'));
        }
        else {
        return redirect('movietickets')->with('status', "url broken");
        }
    }


    public function addToWait(Request $request)
    {
        $ticket_id = $request->input('ticektId');
        $ticketname = $request->input('ticketname');
        $ticket_quantity = $request->input('ticket_quantity');

        if(Auth::check()){

            $ticket_check = Ticket::where('id', $ticket_id )->first();

            if($ticket_check)
            {

                if(Wait::where('ticketid', $ticket_id )->where('userid', Auth::id())->exists())
                {
                    return response()->json(['status' => $ticket_check->ticket_name. " already added to waiting"]);
                }
                else{
                        $waitItem = new Wait();
                        $waitItem->ticketid = $ticket_id;
                        $waitItem->userid = Auth::id();
                        $waitItem->quantity = $ticket_quantity;
                        $waitItem->ticketname = $ticketname;
                        $waitItem->save();

                        return response()->json(['status' => $ticket_check->ticket_name. " added to wait"]);
                    }
            }
        }
        else
        {
            return response()->json(['status' => "login to continue"]);
        }

    }

    // view wait items
    public function viewwait(){

        $waitItem = Wait::where('userid', Auth::id())->get();

        return view('frontend.wait', compact('waitItem'));
    }

    // delete tickts in the wait
    public function deletehold($id)
    {
        $tickehold = Wait::find($id);
        $tickehold->delete();
        return redirect('frontend/wait')->with('status', "removed from hold");
    }

    // user view ticket
    public function myTicket(){
        $deailedTicket = Booking::where('userid', Auth::id())->get();
        $userTicket = Booked::where('userid', Auth::id())->get();
        return view('userinfor.userTickets', compact('deailedTicket', 'userTicket'));
    }

}
