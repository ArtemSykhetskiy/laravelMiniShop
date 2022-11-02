@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 50px">
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{route('admin.products.update', $product)}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>{{__('product.Title')}}</label>
                    <input type="text" class="form-control" placeholder="{{__('product.Title')}}" name="title" value="{{$product->title}}">
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label for="exampleFormControlSelect1">{{__('product.Select_category')}}</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category['id'] }}"
                                {{ $category['id'] === $product->category->id ? 'selected' : '' }}
                            >{{ $category['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label>{{__('product.Price')}}</label>
                    <input type="text" class="form-control" placeholder="{{__('product.Price')}}" name="price" value="{{$product->price}}">
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label>{{__('product.In_stock')}}</label>
                    <input type="text" class="form-control" placeholder="{{__('product.In_stock')}}" name="in_stock" value="{{$product->in_stock}}">
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label>{{__('product.Discount_in_%')}}</label>
                    <input type="text" class="form-control" placeholder="{{__('product.Discount_in_%')}}" name="discount" value="{{$product->discount}}">
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label>{{__('product.SKU')}}</label>
                    <input type="text" class="form-control" placeholder="{{__('product.SKU')}}" name="SKU" value="{{$product->SKU}}">
                </div>

                <div class="form-group" style="margin-top: 25px">
                    <label>{{__('product.Description')}}</label>
                    <textarea class="form-control" rows="3" name="description" >{{$product->description}}</textarea>
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label>{{__('product.Short_description')}}</label>
                    <textarea class="form-control" rows="3" name="short_description" >{{$product->short_description}}</textarea>
                </div>
                <button type="submit" style="margin-top: 25px">{{__('product.Submit')}}</button>
            </form>
        </div>
    </div>
</div>

@endsection
