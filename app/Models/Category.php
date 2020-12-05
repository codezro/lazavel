<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryProducts;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categoryProducts(){
        return $this->hasMany(CategoryProducts::class);
    }
}
