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
            <form method="post" action="{{route('admin.categories.store')}}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}">
                </div>
                <div class="form-group" style="margin-top: 25px">
                    <label>Description</label>
                    <textarea class="form-control" rows="3" name="description" >{{old('description')}}</textarea>
                </div>
                <button type="submit" style="margin-top: 25px">Create Category</button>
            </form>
        </div>
    </div>
</div>

@endsection
