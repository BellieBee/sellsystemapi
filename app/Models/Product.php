<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $table = 'products';
    protected $fillable = [ 'name', 'price', 'tax' ];

    public function sells() {
        return $this->hasMany(Sell::class, 'product_id', 'id');
    }
}
