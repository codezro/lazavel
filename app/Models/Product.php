<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\CategoryProducts;
use App\Models\Image;

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
}
