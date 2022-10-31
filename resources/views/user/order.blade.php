@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <form method="post" action="{{route('profile.order.cancel', $order)}}">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-danger">Cancel</button>
                    </form>
                <form method="post" action="{{route('admin.order.update', $order)}}" >
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="Title">Status</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="status_id" disabled>

                            @foreach(\App\Models\OrderStatus::all() as $status)
                                <option value="{{ $status['id'] }}"
                                    {{ $status['id'] === $order->status_id ? 'selected' : '' }}
                                >{{ $status['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{$order->name}}" disabled>
                    </div>

                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control" placeholder="Surname" name="surname" value="{{$order->surname}}" disabled>
                    </div>
                    <div class="form-group" style="margin-top: 25px">
                        <label>Phone</label>
                        <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{$order->phone}}" disabled>
                    </div>
                    <div class="form-group" style="margin-top: 25px">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Email" name="email" value="{{$order->email}}" disabled>
                    </div>
                    <div class="form-group" style="margin-top: 25px">
                        <label>Country</label>
                        <input type="text" class="form-control" placeholder="Country" name="country" value="{{$order->country}}" disabled>
                    </div>
                    <div class="form-group" style="margin-top: 25px">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" name="city" value="{{$order->city}}" disabled>
                    </div>
                    <div class="form-group" style="margin-top: 25px">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Adress" name="address" value="{{$order->address}}" disabled>
                    </div>

                    <div class="form-group" style="margin-top: 25px">
                        <label>Notes</label>
                        <textarea class="form-control" rows="3" name="notes" >{{$order->notes}}</textarea>
                    </div>
                    <button type="submit" style="margin-top: 25px">Submit</button>
                </form>
            </div>
            <div class="col-md-6">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Single price</th>
                        <th scope="col">SKU </th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->products as $product)
                        <tr>
                            <td><a href="{{route('products.show', $product)}}" target="_blank"> {{$product->title}}</a></td>
                            <td>{{$product->pivot->single_price}}</td>
                            <td>{{$product->SKU}}</td>
                            <td>{{$product->pivot->quantity}}</td>
                            <td>{{$product->pivot->single_price * $product->pivot->quantity}}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>Discount - {{\Gloudemans\Shoppingcart\Facades\Cart::instance('cart')->discount()}}</td>
                    </tr>
                    <tr>
                        <td>Subtotal - {{\Gloudemans\Shoppingcart\Facades\Cart::instance('cart')->subtotal()}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
