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
                        <th scope="col">Name</th>
                        <th scope="col">Total </th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>{{$order->name . $order->surname}}</td>
                            <td>{{$order->total}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>
                                <a href="{{route('admin.order.edit', $order)}}"><button type="button" class="btn btn-primary">Edit</button></a>

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
