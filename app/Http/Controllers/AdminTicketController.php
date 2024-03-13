<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\File;

class AdminTicketController extends Controller


{

    public function ticket_adminview(){

        $adminTicket = Ticket::all();
        return view('admin/addTicket', compact('adminTicket'));
    }


    public function add_ticket(Request $request){

        $ticket = new Ticket;
        $ticket->ticket_name = $request->ticket_name ;
        $ticket->category = $request->category;
        $ticket->price =$request ->price;
        $ticket->location =$request ->location;
        $ticket->description =$request ->description;
        $ticket->quantity =$request ->quantity;
        $ticket->event_date =$request ->event_date;

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/img/tickets/',$filename);
            $ticket->image = $filename;
        }

        $ticket->save();

        return redirect('admin/addTicket')->with('status', "ticket added succefully");
    }

    public function edit_ticket($id){
        $editticket = Ticket::find($id);
        return view('admin/editTicket', compact('editticket',));
    }



    public function update_ticket(Request $request, $id){

        $upateTicket = Ticket::find($id);
        if($request->hasfile('image')){

            $path = 'assets/img/tickets/'.$upateTicket->image;
            if(File::exists($path)){

                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/img/tickets/',$filename);
            $upateTicket->image = $filename;
        }
        $upateTicket->ticket_name = $request->ticket_name ;
        $upateTicket->category = $request->category;
        $upateTicket->price =$request ->price;
        $upateTicket->location =$request ->location;
        $upateTicket->description =$request ->description;
        $upateTicket->quantity =$request ->quantity;
        $upateTicket->event_date =$request ->event_date;
        $upateTicket->update();

        return redirect('admin/addTicket')->with('status', "upated successfully");
    }


    public  function delete_ticket($id){
        $ticket = Ticket::find($id);
        $path = 'assets/img/tickets/'.$ticket->image;

        $ticket->delete();
        return redirect('admin/addTicket')->with('status', "Deleted successfully");

    }

    public function adminBookingView(){

        $adminBooking = Booking::all();
        return view('admin/dashboard', compact('adminBooking'));
    }
}
