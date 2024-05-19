<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Inertia\Response;

class DashboardController extends Controller
{
    public function orders(): Response {
        /**
         * Получаем заказы, сортируем "последние северху", декодируем json объект корзины.
         */
        $orders = Order::query()->latest('created_at')->get();
        for($i = 0; $i < count($orders); $i++) {
            $orders[$i]['items'] = json_decode(Crypt::decryptString($orders[$i]['items']));
        }

        return inertia('Dashboard', compact('orders'));
    }

    public function order_destroy(Request $request): RedirectResponse {
        /**
         * Удаляем заказ.
         */
        $validated = $request->validate([
            'id_order' => ['required', 'numeric'],
        ]);
        Order::destroy($validated['id_order']);
        return redirect(route('dashboard'));
    }
}
