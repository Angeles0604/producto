<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table = 'inventory';
    protected $primaryKey = 'id_inventory';
    protected $fillable = ['product_sku', 'id_size', 'id_color', 'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_sku', 'product_sku');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'id_size');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'id_color');
    }

    // En Inventory.php
    public function productImage()
    {
        return $this->hasOne(ProductImage::class, 'product_id', 'product_sku')
            ->whereColumn('color_id', 'id_color');
    }

}
