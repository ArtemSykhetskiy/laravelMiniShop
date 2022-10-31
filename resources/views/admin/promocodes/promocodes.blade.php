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
                        <th scope="col">ID</th>
                        <th scope="col">Code</th>
                        <th scope="col">Expired At</th>
                        <th scope="col">Actions</th>


                    </tr>
                    </thead>
                    <tbody>
                    @foreach($promocodes as $promocode)
                        <tr>
                            <td>{{$promocode->id}}</td>
                            <td>{{$promocode->code}}</td>
                            <td>{{$promocode->expired_at}}</td>

                            <td>
                                <a href="{{route('admin.promocodes.show', $promocode)}}" class="btn btn-primary">Show</a>
                                {{--                                            <a href="{{route('admin.promocodes.edit', $promocode)}}" class="btn btn-primary">Show</a>--}}
                                <form method="post" action="{{route('admin.promocodes.destroy', $promocode)}}">
                                    @csrf
                                    @method('DELETE')
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
