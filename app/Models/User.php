<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'fname',
        'lname',
        'username',
        'sex'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // presenters
    public function fullname()
    {
        return ucwords($this->fname . ' ' . $this->lname);
    }

    // Relationships

    public function firm()
    {
        return $this->hasOne(Firm::class);
    }

    public function coy()
    {
        return $this->hasOne(Company::class);
    }

    public function clients()
    {
        return $this->hasMany(Customer::class);
    }

    public function products()
    {
        // using this hasManyThrough can only work if the two binding tables are not using a manyToMany relationship
        // return $this->hasManyThrough(Product::class, StoreWarehouse::class);
        return $this->hasMany(Product::class);
    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }

    public function prodTypes()
    {
        return $this->hasMany(ProdType::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function stores()
    {
        return $this->hasMany(StoreWarehouse::class);
    }

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    // public function employees()
    // {
    //      return $this->hasMany('employees');
    // }

    public function employees()
    {
        return $this->hasManyThrough(Employee::class, StoreWarehouse::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    public function measurement_scales()
    {
        return $this->hasMany(MeasurementScale::class);
    }
    // the cart will be implemented on its own







}
