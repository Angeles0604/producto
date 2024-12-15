<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id_product';
    protected $fillable = [
        'product_sku', 'product_name', 'product_description', 'price', 'id_brand', 'image', 'status'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'id_brand');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories', 'id_product', 'id_category');
    }
}
