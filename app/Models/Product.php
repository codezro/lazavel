<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\CategoryProducts;
use App\Models\Image;
use App\Models\Order;
use App\Models\Review;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function scopeSearchName($query,$search)
    {
        return $query->orWhere('name','LIKE','%'.$search.'%');
    }

    public function scopeSearchSku($query,$search)
    {
        return $query->orWhere('sku','LIKE','%'.$search.'%');
    }
    
    public function scopeGetItemsBy($query, $noOfItems, $status = 1)
    {
        return $query->where('status', $status)->limit($noOfItems);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categoryProducts()
    {
        return $this->hasMany(CategoryProducts::class);
    }
    
    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}
