<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $orders = $user->orders;

        return view('user/profile', compact('orders', 'user'));
    }

    public function show(Order $order)
    {
        return view('user/order', compact('order'));
    }

    public function cancel(Order $order)
    {
        $order->update(['status_id' => 5]);

        return redirect()->back()->with('success', 'Order successfully canceled');
    }

    public function edit(User $user)
    {
        return view('user/edit', compact('user'));
    }

    public function update(User $user, UserUpdateRequest $request)
    {
        $data = $request->validated();
        $user->update($data);

        return redirect()->back()->with('success', 'User successfully updated');
    }


}
