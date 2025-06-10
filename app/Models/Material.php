<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    // Связь с типом материала
    public function type() {
        return $this->belongsTo(MaterialType::class);
    }

    // Связь с единицей измерения
    public function unit() {
        return $this->belongsTo(Unit::class);
    }
}
