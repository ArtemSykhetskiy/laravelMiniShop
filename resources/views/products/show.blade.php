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
                Title - {{$product->title}}<br>
                Price - {{$product->price}}<br>
                Prict with discount - {{$product->endPrice}}<br>
                Available - {{$product->available}}<br>
                SKU - {{$product->SKU}}<br>
                Category - {{$product->category->name}}<br>
                Description - {{$product->description}}<br>
                <img class="card-img-top" src="{{ '/image/products/origin/'.$product->thumbnail }}" width="100px" style="width: 100px"><br>

                <form method="post" action="{{route('cart.add', $product)}}">
                    @csrf
                    <input type="number" name="product_count" min="1">
                    <button type="submit">Add to cart</button>
                </form>
            </div>
        </div>
    </div>

@endsection
