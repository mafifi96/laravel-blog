<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product_images;
use App\Models\Category;


class Product extends Model
{
    use HasFactory;

    protected $table = 'products';


    protected $guarded = [];


    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function images()
    {

        return $this->hasMany(Product_images::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

}
