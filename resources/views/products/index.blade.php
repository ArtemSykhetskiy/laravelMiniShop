@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($products as $product)

                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ '/image/products/origin/'.$product->thumbnail }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$product->title}}</h5>
                            <h6 class="card-title">{{$product->price}}</h6>
                            <p class="card-text">{{$product->short_description}}</p>
                            <a href="{{route('products.show', $product)}}" class="btn btn-primary">Open</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
@endsection
