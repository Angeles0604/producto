<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryHistory extends Model
{
    use HasFactory;

    protected $table = 'inventory_history';
    protected $primaryKey = 'id_history';
    protected $fillable = ['id_inventory', 'movement_type', 'quantity'];

    public function inventory()
    {
        return $this->belongsTo(Inventory::class, 'id_inventory');
    }
}
