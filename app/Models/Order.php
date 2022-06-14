<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // protected $guarded = ['id'];
    protected $fillable = [
        'billing_name', 'billing_address', 'billing_phone', 'reciever_name', 
        'ship_address', 'receiver_phone', 'city', 'state', 'zip', 'order', 
        'shipping_fee', 'is_shipped', 'tracking_num', 'basket'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
