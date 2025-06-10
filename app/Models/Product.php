<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Отключение временных меток
    public $timestamps = false;

    // Поля для заполнения и обновления
    protected $fillable = [
        'product_type_id',
        'name',
        'article',
        'minPrice',
        'width',
    ];

    // Связь с типом продукта
    public function type() {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    // Связь с элементами рецепта (используемых материалов)
    public function recipe() {
        return $this->hasMany(ProductMaterial::class);
    }

    // Связь с используемыми материалами через рецепт
    public function materials() {
        return $this->belongsToMany(
            Material::class,
            ProductMaterial::class,
        )->withPivot('quantity');
    }
}
