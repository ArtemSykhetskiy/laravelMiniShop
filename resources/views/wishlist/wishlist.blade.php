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
                        <th scope="col">Delete</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach(auth()->user()->wishes as $product)
                        <tr>
                            <th scope="row">{{$product->title}}</th>
                            <td>{{$product->price}}</td>
                            <td>
                                <form method="post" action="{{route('wishlist.remove', $product)}}">
                                    @method('DELETE')
                                    @csrf
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
