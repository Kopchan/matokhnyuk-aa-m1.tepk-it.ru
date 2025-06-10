<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductMaterial extends Pivot
{
    // Указание названия таблицы в БД
    protected $table = 'product_materials';

    // Связь с продуктом
    public function product() {
        return $this->belongsTo(Product::class);
    }

    // Связь с материалом
    public function material() {
        return $this->belongsTo(Material::class);
    }
}
