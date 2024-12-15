<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    protected $table = 'cart_details';
    protected $primaryKey = 'id_detail';
    protected $fillable = ['id_user', 'id_product', 'id_size', 'id_color', 'quantity', 'active'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'id_size');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'id_color');
    }

}
