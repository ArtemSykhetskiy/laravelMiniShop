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
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" placeholder="Name" name="title" value="{{old('title')}}">
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label for="exampleFormControlSelect1">Select category</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label>Price</label>
                    <input type="text" class="form-control" placeholder="Price" name="price" value="{{old('price')}}">
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label>In stock</label>
                    <input type="text" class="form-control" placeholder="In stock" name="in_stock" value="{{old('in_stock')}}">
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label>Discount in %</label>
                    <input type="text" class="form-control" placeholder="Discount" name="discount" value="{{old('discount')}}">
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label>SKU</label>
                    <input type="text" class="form-control" placeholder="SKU" name="SKU" value="{{old('SKU')}}">
                </div>

                <div class="form-group" style="margin-top: 25px">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="description" >{{old('description')}}</textarea>
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label>Short Description</label>
                    <textarea class="form-control" rows="3" name="short_description" >{{old('short_description')}}</textarea>
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label for="exampleFormControlFile1">Thumbnail</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="thumbnail">
                </div>
                <button type="submit" style="margin-top: 25px">Create Product</button>
            </form>
        </div>
    </div>
</div>

@endsection
