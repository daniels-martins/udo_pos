<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company00 extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable = ['name', 'logo', 'head_office', 'phone', 'email'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
