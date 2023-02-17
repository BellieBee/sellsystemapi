<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    public $table = 'bills';
    protected $fillable = [ 'user_id', 'total_tax', 'total_price' ];

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function sellbills() {
        return $this->hasMany(SellBill::class, 'bill_id', 'id');
    }

}
