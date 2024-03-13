<?php

namespace App\Mail;

use App\Models\Booked;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketBooked extends Mailable
{
    use Queueable, SerializesModels;

    public Booked $booked;

    /**
     * Create a new message instance.
     */
    public function __construct(Booked $booked)
    {
        $this->booked = $booked;
    }

    /**
     * Get the message envelope.
     */
    public function build(): void
    {
        $this->subject('Ticket Booked successfully')
             ->from('v-tickets@mail.com')
             ->markdown('email.ticket_booked');
    }
}
