<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderUpdateRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('admin/orders/index', compact('orders'));

    }

    public function edit(Order $order)
    {
        return view('admin/orders/edit', compact('order'));
    }

    public function update(Order $order, OrderUpdateRequest $request)
    {

        $order->update($request->validated());
        return redirect()->route('admin.orders')->with('success', 'Order successfully updated');

    }

}
