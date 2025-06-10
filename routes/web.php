<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Главная страница
Route::view('/', 'home')->name('home');

/* Ресурсный маршрут по CRUD продукта, создающий следующие маршруты:
 * <Метод>   | <Название>       | <Описание>
 * GET       | products.index   | страница списка продуктов
 * GET       | products.show    | страница просмотра информации о продукте
 * GET       | products.edit    | страница с формой редактирования конкретного продукта
 * PUT|PATCH | products.update  | путь для формы на обновление данных конкретного продукта
 * GET       | products.create  | страница с формой создания продукта
 * POST      | products.store   | путь для формы на сохранение нового продукта
 */
Route::resource('products', ProductController::class);
