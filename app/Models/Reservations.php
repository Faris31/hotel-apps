<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $fillable = [
        'room_id',
        'reservation_number',
        'guest_name',
        'guest_email',
        'guest_phone',
        'guest_status',
        'guest_id_card',
        'guest_qty',
        'guest_checkin',
        'guest_checkout',
        'guest_note',
        'isOnline',
        'isReserve',
        'subtotal',
        'totalAmount',
        'guest_room_number',
        'payment_method',
    ];

    // protected $fillable = [
    //     'guest_name',
    //     'guest_email',
    //     'guest_phone',
    //     'guest_note',
    //     'guest_room_number',
    //     'guest_check_in',
    //     'guest_check_out',
    //     'payment_method',
    //     'room_id',
    // ];
}
