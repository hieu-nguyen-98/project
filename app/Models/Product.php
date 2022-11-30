<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','name','description','image','price','discount_price'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_attributes');
    }
}
