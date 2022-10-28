@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-md-12">

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
        </div>
    </div>

@endsection
