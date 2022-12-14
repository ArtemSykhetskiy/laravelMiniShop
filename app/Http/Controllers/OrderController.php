<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Notifications\NewOrderNotification;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function create(OrderCreateRequest $request)
    {
        $user = auth()->user();
        $status = OrderStatus::defaultStatus()->first();

        $data = array_merge($request->validated(), [
            'status_id' => $status->id,
            'total' => Cart::instance('cart')->subtotal(2, '.', ''),
            'user_id' => $user->id
        ]);

        DB::transaction(function () use ($user, $data){
            $order = $user->orders()->create($data);
            $this->addProductsToOrder($order);
            $user->notify(new NewOrderNotification($order));
        });

        return redirect()->route('thankYou');

    }

    public function addProductsToOrder(Order $order)
    {
        Cart::instance('cart')->content()->each(function($cartItem) use ($order) {
            $order->products()->attach(
                $cartItem->model,
                [
                    'quantity' => $cartItem->qty,
                    'single_price' => $cartItem->price
                ]
            );

            $inStock = $cartItem->model->in_stock - $cartItem->qty;

            if (!$cartItem->model->update(['in_stock' => $inStock])) {
                throw new Exception("Smth went wrong with product ID({$cartItem->id}) while updating qty");
            }
        });
    }
}
