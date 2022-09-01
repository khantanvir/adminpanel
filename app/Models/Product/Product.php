<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\ProductAttribute;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";

    public function attribute(){
        return $this->hasMany(ProductAttribute::class);
    }
}
