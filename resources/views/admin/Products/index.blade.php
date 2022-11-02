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
                        <th scope="col">#</th>
                        <th scope="col">{{__('product.Title')}}</th>
                        <th scope="col">{{__('product.Category')}}</th>
                        <th scope="col">{{__('product.Price')}}</th>
                        <th scope="col">{{__('product.SKU')}}</th>
                        <th scope="col">{{__('product.Actions')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                    <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->{'title_' .app()->getLocale()} }}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->SKU}}</td>
                        <td>
                           <a href="{{route('admin.products.edit', $product)}}"><button type="button" class="btn btn-primary">{{__('product.Edit')}}</button></a>
                            <form method="post" action="{{route('admin.products.destroy', $product)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">{{__('product.Delete')}}</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
              </div>
        </div>
    </div>
@endsection
