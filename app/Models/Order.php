<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Address;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function address(){
        return $this->belongsTo(Address::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}