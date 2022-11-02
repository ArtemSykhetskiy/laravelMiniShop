@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if(session('token'))
                <div class="alert alert-success" role="alert">
                    {{ session('token') }}
                </div>
            @endif

            @if($user->tokenCan('index'))
                {{ 'Yes'  }}
            @endif

            <form action="{{route('admin.tokens.create')}}" method="post">
                @csrf
                <button type="submit">Create token</button>
            </form>
        </div>
    </div>
</div>

@endsection
