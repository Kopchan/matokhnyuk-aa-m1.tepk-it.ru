<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerProduct extends Model
{
    public $timestamps = false;

//    protected $fillable = [
//        'product_id',
//        'partner_id',
//        'quantity',
//        'date',
//    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function partner() {
        return $this->belongsTo(Partner::class);
    }
}
