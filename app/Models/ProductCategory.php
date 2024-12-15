<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductCategory extends Pivot
{
    protected $table = 'products_categories';
    protected $fillable = ['id_product', 'id_category'];
}
