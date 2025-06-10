<?php

namespace App\Http\Controllers;

use App\Models\MaterialType;
use App\Models\ProductType;
use Throwable;

class FuncController extends Controller
{
    // Метод из 4-го модуля
    /** Готовый метод для расчёта требуемого количество материала для закупки.
     *
     * При ошибке: возвращает -1
     *
     * Если материалов на складе достаточно: возвращает 0
     *
     * @param int   $productTypeId             Идентификатор типа продукции
     * @param int   $materialTypeId            Идентификатор типа материала
     * @param int   $productQuantity           Количество продуктов, на которое используется материал
     * @param float $productParam1             Параметр продукта 1
     * @param float $productParam2             Параметр продукта 2
     * @param float $availableMaterialQuantity Количество материалов на складе
     * @return int Требуемое количество материала для закупки
     */
    public static function calcMaterial4ProductSafe(
        $productTypeId,
        $materialTypeId,
        $productQuantity,
        $productParam1,
        $productParam2,
        $availableMaterialQuantity,
    ): int {
        try {
            return self::calcMaterial4ProductUnsafe(
                $productTypeId,
                $materialTypeId,
                $productQuantity,
                $productParam1,
                $productParam2,
                $availableMaterialQuantity,
            );
        }
        catch (Throwable) {
            return -1;
        }
    }

    /** Сырой метод для расчёта требуемого количество материала для закупки.
     *
     * При ошибке: бросает исключение
     *
     * Если материалов на складе достаточно: возвращает 0
     *
     * @param int $productTypeId Идентификатор типа продукции
     * @param int $materialTypeId Идентификатор типа материала
     * @param int $productQuantity Количество продуктов, на которое используется материал
     * @param float $productParam1 Параметр продукта 1
     * @param float $productParam2 Параметр продукта 2
     * @param float $availableMaterialQuantity Количество материалов на складе
     * @return int Требуемое количество материала для закупки
     */
    public static function calcMaterial4ProductUnsafe(
        int $productTypeId,
        int $materialTypeId,
        int $productQuantity,
        float $productParam1,
        float $productParam2,
        float $availableMaterialQuantity,
    ): int {
        // Проверяем что аргументы не отрицательные, иначе исключение
        self::ensureNonNegative(compact(
            'productQuantity',
            'productParam1',
            'productParam2',
            'availableMaterialQuantity',
        ));

        // Получаем тип продукции и тип материала, иначе исключение
        $productType  = ProductType ::findOrFail($productTypeId);
        $materialType = MaterialType::findOrFail($materialTypeId);

        // Рассчитываем количество материала на одну единицу продукции
        $materialPerUnit = $productParam1 * $productParam2 * $productType->coefficient;

        // Рассчитываем общее количество материала без учета брака
        $totalMaterialNeeded = $materialPerUnit * $productQuantity;

        // Учитываем процент брака материала
        $totalMaterialWithDefect = $totalMaterialNeeded * (1 + $materialType->defect / 100);

        // Вычитаем имеющийся материал на складе
        $materialToPurchase = $totalMaterialWithDefect - $availableMaterialQuantity;

        // Если материала на складе достаточно, возвращаем 0
        if ($materialToPurchase <= 0)
            return 0;

        // Округляем до целого числа в большую сторону
        return (int) ceil($materialToPurchase);
    }

    /** Проверяет, что ни один из переданных параметров не отрицательный.
     *
     * Если хотя бы один отрицательный: бросает исключение
     */
    public static function ensureNonNegative(array $params): void
    {
        $negativeParams = [];

        foreach ($params as $name => $value) {
            if ($value < 0) {
                $negativeParams[] = $name;
            }
        }

        if ($negativeParams) {
            throw new \InvalidArgumentException(
                'The following parameters cannot be negative: '
                . implode(', ', $negativeParams)
            );
        }
    }
}
