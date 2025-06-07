<?php

namespace App\Http\Controllers;

use App\Models\MaterialType;
use App\Models\ProductType;
use Illuminate\Http\Request;

class FuncController extends Controller
{
    // Метод из 4-го задания
    // TODO: протестировать
    public static function calcMaterial4ProductSafe(
        $productTypeId,
        $materialTypeId,
        $receiveQuantity,
        $param1,
        $param2,
    ) {
        try {
            return self::calcMaterial4Product(
                $productTypeId,
                $materialTypeId,
                $receiveQuantity,
                $param1,
                $param2,
            );
        }
        catch (\Exception $e) {
            return -1;
        }
    }

    public static function calcMaterial4Product(
        int $productTypeId,
        int $materialTypeId,
        int $receiveQuantity,
        float $param1,
        float $param2,
    ): int {
        try {
            if ($param1 < 0 || $param2 < 0) {
                return -1;
            }
            $materialType = MaterialType::find($materialTypeId);
            if (!$materialType) {
                return -1;
            }
            $productType = ProductType::find($productTypeId);
            if (!$productType) {
                return -1;
            }

            $result = $productType->coef
                * $param1
                * $param2
                * $receiveQuantity
                * (1 + $materialType->marriage / 100);

            return ceil($result);
        }
        catch (\Exception $e) {
            return -1;
        }
    }
}
