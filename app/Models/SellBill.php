<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellBill extends Model
{
    use HasFactory;

    public $table = 'sell_bills';
    protected $fillable = [ 'bill_id', 'sell_id' ];

    public function bills() {
        return $this->belongsTo(Bill::class, 'bill_id', 'id');
    }

    public function sells() {
        return $this->belongsTo(Sell::class, 'sell_id', 'id');
    }
}
