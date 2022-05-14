<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firm extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'logo', 'head_office', 'phone', 'email'];

    public function user()
    {
         return $this->belongsTo(User::class);
    }
}
