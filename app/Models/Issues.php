<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issues extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'device',
       
    ];
    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
