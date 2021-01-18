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
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function scopeFilterCategory($query,$categoryId)
    {
        return $query->whereHas('categoryProducts' , function ($query) use($categoryId) {
            if ($categoryId){
                $query->where('category_id',$categoryId);
            }
        });
    }

    public function scopeSortResultBy($query,$sortType)
    {
        switch ($sortType) {
            case 'popularity':
                return $query->withCount('order')->orderBy('order_count','desc');
                break;
            case 'relevance':
                return $query->withCount('review')->orderBy('review_count','desc');
                break;
            case 'low-high':
                return $query->orderBy('sale_price','asc');
                break;
            case 'high-low':
                return $query->orderBy('sale_price','desc');
                break;
            case 'newest':
                return $query->orderBy('created_at','desc');
                break;
            case 'oldest':
                return $query->orderBy('created_at','asc');
                break;
            default:
                return $query->withCount('order')->orderBy('order_count','desc');
                break;
        }
    }
    
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

    public function favorite()
    {
        return $this->hasMany(Favorite::Class);
    }
}
