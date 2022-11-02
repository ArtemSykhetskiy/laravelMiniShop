<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function index(User $user)
    {
        return view('token/token', compact('user'));
    }

    public function create(Request $request)
    {
        if(isAdmin(auth()->user())){
            $token = $request->user()->createToken($request->device_name ?? 'api', ['basic', 'order:index', 'order:show']);
        }
        else{
            $token = $request->user()->createToken($request->device_name ?? 'api', ['basic']);
        }


        return redirect()->back()->with(['token' => $token->plainTextToken]);
    }
}
