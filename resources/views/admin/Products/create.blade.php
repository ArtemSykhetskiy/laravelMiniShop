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
            <form method="post" action="{{route('admin.products.store')}}" enctype="multipart/form-data">
                @csrf
                @foreach(config('translatable.locales') as $locale)
                    <div class="form-group">
                        <label>{{__('product.Title')}}{{ strtoupper($locale) }}</label>
                        <input type="text" class="form-control" placeholder="{{__('product.Select_category')}}" name="{{ $locale }}[title]" value="{{old('title')}}">
                    </div>
                    <div class="form-group" style="margin-top: 25px">
                        <label>{{__('product.Description')}}{{ strtoupper($locale) }}</label>
                        <textarea class="form-control" rows="3" name="{{ $locale }}[description]" >{{old('description')}}</textarea>
                    </div>
                    <div class="form-group" style="margin-top: 25px">
                        <label>{{__('product.Short_description')}}{{ strtoupper($locale) }}</label>
                        <textarea class="form-control" rows="3" name="{{ $locale }}[short_description]" >{{old('short_description')}}</textarea>
                    </div>
                @endforeach
                <div class="form-group" style="margin-top: 25px">
                    <label for="exampleFormControlSelect1">{{__('product.Select_category')}}</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label>{{__('product.Price')}}</label>
                    <input type="text" class="form-control" placeholder="{{__('product.Price')}}" name="price" value="{{old('price')}}">
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label>{{__('product.In_stock')}}</label>
                    <input type="text" class="form-control" placeholder="{{__('product.In_stock')}}" name="in_stock" value="{{old('in_stock')}}">
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label>{{__('product.Discount_in_%')}}</label>
                    <input type="text" class="form-control" placeholder="{{__('product.Discount_in_%')}}" name="discount" value="{{old('discount')}}">
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label>{{__('product.SKU')}}</label>
                    <input type="text" class="form-control" placeholder="{{__('product.SKU')}}" name="SKU" value="{{old('SKU')}}">
                </div>


                <div class="form-group" style="margin-top: 25px">
                    <label for="exampleFormControlFile1">{{__('product.Thumbnail')}}</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="thumbnail">
                </div>
                <button type="submit" style="margin-top: 25px">{{__('product.Create_product')}}</button>
            </form>
        </div>
    </div>
</div>

@endsection
