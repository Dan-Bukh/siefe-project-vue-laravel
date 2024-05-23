<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use Inertia\Response;
use App\Services\CatalogService;

class CatalogController extends Controller
{
    public function index(Request $request, Catalog $catalog, CatalogService $service): Response {
        /**
         * Получем карточки товаров и фильтруем,
         * потом разбиваем данные, делаем из строки массив фотографий
         * и дополняем им локалный путь.
         */
        $cards = $service->ImagesExplodeWithFor($catalog->GetCardsWithFilters($request));
        $filters = $request->only('search', 'category');
        return inertia('Catalog', compact('cards', 'filters'));
    }

    public function show($id, Catalog $catalog, CatalogService $service): Response {
        /**
         * Получаем карточку товара по id, делаем из строки массив фотографий и дополняем им локалный путь.
         */
        $item = $service->ImagesExplode($catalog->GetCardById($id));
        return inertia('Item', compact('item'));
    }
}
