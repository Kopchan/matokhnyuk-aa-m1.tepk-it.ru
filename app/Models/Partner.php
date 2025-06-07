<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    public $timestamps = false;

//    protected $fillable = [
//        'type_id',
//        'name',
//        'ceo',
//        'email',
//        'phone',
//        'address',
//        'inn',
//        'rating',
//    ];

    public function type() {
        return $this->belongsTo(PartnerType::class);
    }

//    public function sales() {
//        return $this->hasMany(PartnerProduct::class);
//    }
}
