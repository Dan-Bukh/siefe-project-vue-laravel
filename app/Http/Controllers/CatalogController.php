<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use Illuminate\Support\Facades\Crypt;

class CatalogController extends Controller
{
    public function catalog(Request $request) {
        $cards = Catalog::query()
        ->when($request->input('search'), function($query, $search) {
            $query->where('title', 'like', "%{$search}%");
        })
        ->when($request->input('category'), function($query, $category) {
            $query->where('category', $category);
        })
        ->get(['id','category', 'title', 'price', 'image']);

        for($i = 0; $i < count($cards); $i++) {
            $cards[$i]['image'] = asset($cards[$i]['image']);
        }

        $filters = $request->only('search', 'category');
        return inertia('Catalog', compact('cards', 'filters'));
    }

    public function item($id) {
        $item = Catalog::query()->where('id', $id)->get();
        $item[0]['image'] = asset($item[0]['image']);
        return inertia('Item', compact('item'));
    }

    public function item_store(Request $request) {
        $request->validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email'],
            'number' => ['required', 'max:50'],
            'items' => ['required'],
        ]);
        $items = Crypt::encryptString(json_encode($request->input('items')));
        dd(json_decode(Crypt::decryptString($items)));
        return to_route('success');
    }
}
