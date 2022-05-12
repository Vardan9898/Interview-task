<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class DashboardController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $orders = Order::with('client', 'product')->filter(request([
            'search', 'filters',
        ]));

        $dataOrders = $orders->get()->groupBy('date')->map(fn ($total) => $total->sum('total'));

        return view('orders.index', [
            'orders'     => $orders->sortable()->paginate(5)->withQueryString(),
            'dataOrders' => $dataOrders,
        ]);
    }

    /**
     * @param  Order  $order
     * @return Application|Factory|View
     */
    public function edit(Order $order)
    {
        return view('orders.edit', [
            'order' => $order,
        ]);
    }

    /**
     * @param  UpdateOrderRequest  $request
     * @param  Order  $order
     * @return RedirectResponse
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->only('total', 'date'));

        return Redirect::route('dashboard.index')->with('success', 'Order updated');
    }

    /**
     * @param  Order  $order
     * @return RedirectResponse
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return Redirect::route('dashboard.index');
    }
}
