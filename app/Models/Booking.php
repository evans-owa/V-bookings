<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'bookedid',
        'ticket_id',
        'userid',
        'category',
        'price',
        'ticket_number',
        'quantity',
    ];

    public function tickets(){

        return $this->belongsTo(Ticket::class, 'ticket_id', 'id' );
    }
}
