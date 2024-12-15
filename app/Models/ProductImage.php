<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    // La tabla en la base de datos
    protected $table = 'product_images';

    // Los campos que se pueden asignar masivamente
    protected $fillable = [
        'product_id',
        'color_id',
        'image_path',
        'created_at',
        'updated_at',
    ];

    // Relación con el modelo Product (1:N)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id_product');
    }

    // Relación con el modelo Color (1:N)
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id', 'id_color');
    }
}
