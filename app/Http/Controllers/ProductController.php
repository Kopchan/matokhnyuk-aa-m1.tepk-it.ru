<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Material;
use App\Models\Product;
use App\Models\ProductMaterial;
use App\Models\ProductType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /** Возвращает представление со списком продукции */
    public function index(): View
    {
        $products = Product
            ::with('type')
            ->get();

        return view('products.index', compact('products'));
    }

    /** Возвращает представление с формой создания продукта */
    public function create(): View
    {
        $types = ProductType::all();
        return view('products.create', compact('types'));
    }

    /** Пытается сохранить полученный продукт и переводит к списку,
     * иначе выводит ошибки если не удалось пройти валидацию */
    public function store(ProductRequest $request): RedirectResponse
    {
        $product = Product::create($request->validated());
        return redirect()->route('products.show', $product);
    }

    /** Возвращает представление с общей информацией о продукте и используемых материалов */
    public function show(Product $product): View
    {
        $product->load('type', 'materials', 'materials.unit');
        $cost = $product->recipe->sum(fn($item) => $item->material->price * $item->quantity);
        $product->cost = round($cost, 2);
        return view('products.show', compact('product'));
    }

    /** Возвращает представление с формой редактирования продукта */
    public function edit(Product $product): View
    {
        $types = ProductType::all();
        return view('products.edit', compact('product', 'types'));
    }

    /** Пытается изменить продукт полученной информацией и переводит к списку продукции,
     * иначе выводит ошибки если не удалось пройти валидацию */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());
        return redirect()->route('products.show', $product);
    }

    /** Удаление продукта из БД (отключено) и перевод к списку продукции */
    public function destroy(Product $product): RedirectResponse
    {
        //$product->delete();
        return redirect()->route('products.index');
    }
}
