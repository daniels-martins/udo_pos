<?php

namespace App\Models;

use App\Models\Order;
use App\Models\StoreWarehouse as Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // pls don't use fillable when u use $guarded
    protected $guarded = ['id'];

    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

}

