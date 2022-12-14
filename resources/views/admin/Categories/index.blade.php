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
                        <th scope="col">{{__('category.Name')}}</th>
                        <th scope="col">{{__('category.Description')}}</th>
                        <th scope="col">{{__('product.Actions')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                           <a href="{{route('admin.categories.edit', $category)}}"><button type="button" class="btn btn-primary">{{__('product.Edit')}}</button></a>
                            <form method="post" action="{{route('admin.categories.destroy', $category)}}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">{{__('product.Delete')}}</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $categories->links() }}
              </div>
        </div>
    </div>
@endsection
