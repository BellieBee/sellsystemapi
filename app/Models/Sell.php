<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    use HasFactory;

    public $table = 'sells';
    protected $fillable = [ 'user_id', 'product_id', 'is_checked' ];

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
