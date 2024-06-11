<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'issues_id',
        'price',
        'date',
        'time',
        'device',
        'description',
        'brand',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function issues(){
        return $this->belongsTo(Issues::class);
    }
}
