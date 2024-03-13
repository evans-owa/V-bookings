<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;

class Wait extends Model
{
    use HasFactory;
    protected $table = 'waits';
    protected $fillable = [
        'userid',
        'ticketid',
        'quantity',
        'ticketname',
    ];


    public function tickets(){

        return $this->belongsTo(Ticket::class, 'ticketid', 'id' );
    }
}
