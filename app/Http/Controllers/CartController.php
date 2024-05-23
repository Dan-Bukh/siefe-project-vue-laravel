<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\CartStoreRequest;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class CartController extends Controller
{
    public function index(): Response {
        return inertia('Cart');
    }

    public function store(CartStoreRequest $request): RedirectResponse {
        /**
         * Валидируем запрос, кодируем в json массив корзины(Mutator) и создаем заказ.
         */
        Order::create($request->validated());
        return redirect(route('cart.success'));
    }

    public function success(): Response {
        return inertia('Success');
    }
}
