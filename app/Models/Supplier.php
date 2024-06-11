<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

   protected $fillable =[
        'company_name',
        'contact',
        'email',
        'address',
    ];

    public function inventories(){
        return $this->hasMany(Inventory::class);
    }
}
