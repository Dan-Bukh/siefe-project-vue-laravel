<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(Order $orders): Response {
        /**
         * Получаем заказы, сортируем "новые сверху", декодируем json объект корзины(Accessor).
         */
        $orders = $orders->GetLatestOrders();
        return inertia('Dashboard', compact('orders'));
    }

    public function destroy($id): RedirectResponse {
        Order::destroy($id);
        return redirect(route('dashboard'));
    }
}
