@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-md-6">

                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quntity</th>
                        <th scope="col">Total price</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Delete</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\Gloudemans\Shoppingcart\Facades\Cart::instance('cart')->content() as $row)
                        <tr>
                            <th scope="row">{{$row->name}}</th>
                            <td>{{$row->price}}</td>
                            <td>{{$row->qty}}</td>
                            <td>{{$row->subtotal}}</td>
                            <td>{{$row->subtotal}}</td>
                            <td>
                                <form method="post" action="{{route('cart.remove')}}">
                                    @method('DELETE')
                                    @csrf
                                    <input type="hidden" value="{{ $row->rowId }}" name="rowId">
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Discount</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">{{ Cart::discount() }}</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">{{ Cart::total() }}</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='{{route('checkout')}}'">Proceed To Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{session('success')}}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{session('error')}}
                            </div>
                        @endif
                        <label class="text-black h4" for="coupon">Coupon</label>
                        <p>Enter your coupon code if you have one.</p>
                    </div>
                    <form method="post" action="{{route('admin.promocodes.apply')}}">
                        @csrf
                        <div class="col-md-8 mb-3 mb-md-0">
                            <input type="text" class="form-control py-3" name="coupon" id="coupon" placeholder="Coupon Code">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary btn-sm" type="submit">Apply Coupon</button>
                        </div>
                    </form>
                </div>
                <a href="{{route('checkout')}}">Checkout</a>

            </div>
        </div>
    </div>

@endsection
