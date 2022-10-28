@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

                @foreach($categories as $category)
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{$category->name}}</h5>
                                <p class="card-text">{{$category->description}}</p>
                                <a href="{{route('categories.show', $category)}}" class="card-link">All products </a>

                            </div>
                        </div>
                    </div>
                @endforeach

        </div>
    </div>

@endsection
