<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Catalog;
use Illuminate\Support\Facades\Crypt;
use Inertia\Response;

class CatalogController extends Controller
{
    public function catalog(Request $request): Response {
        /**
         * Получем карточки товаров и фильтруем.
         */
        $cards = Catalog::query()
        ->when($request->input('search'), function($query, $search) {
            $query->where('title', 'like', "%{$search}%");
        })
        ->when($request->input('category'), function($query, $category) {
            $query->where('category', $category);
        })
        ->get(['id','category', 'title', 'price', 'image']);

        /**
         * Разбиваем данные, делаем из строки массив фотографий и дополняем им локалный путь.
         */
        for($i = 0; $i < count($cards); $i++) {
            $images = explode("&", $cards[$i]['image']);
            foreach($images as $key => $image) {
                $images[$key] = asset($image);
            }
            $cards[$i]['image'] = $images;
        }

        $filters = $request->only('search', 'category');
        return inertia('Catalog', compact('cards', 'filters'));
    }

    public function item($id): Response {
        /**
         * Получаем карточку товара по id, делаем из строки массив фотографий и дополняем им локалный путь.
         */
        $item = Catalog::query()->where('id', $id)->get();
        $images = explode("&", $item[0]['image']);
        foreach($images as $key => $image) {
           $images[$key] = asset($image);
        }
        $item[0]['image'] = $images;
        return inertia('Item', compact('item'));
    }

    public function cart_store(Request $request): RedirectResponse {
        /**
         * Валидируем запрос и создаем заказ.
         */
        $request->validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email'],
            'number' => ['required', 'max:50'],
            'items' => ['required'],
        ]);

        Order::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'number' => $request->input('number'),
            'items' => Crypt::encryptString(json_encode($request->input('items'))),
        ]);
        return redirect(route('success'));
    }
}
