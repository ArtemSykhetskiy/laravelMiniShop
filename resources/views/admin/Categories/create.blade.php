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
                @foreach(config('translatable.locales') as $locale)

                        <div class="form-group">
                            <label>{{__('category.Name')}} {{ strtoupper($locale) }}</label>
                            <input type="text" class="form-control" placeholder="{{__('category.Name')}}" name="{{ $locale }}[name]" value="{{ old($locale . '.name') }}">
                        </div>
                        <div class="form-group" style="margin-top: 25px">
                            <label>{{__('category.Description')}}</label>
                            <textarea class="form-control" rows="3" name="{{ $locale }}[description]" > {{ old($locale . '.description') }}</textarea>
                        </div>

                @endforeach
                <button type="submit" style="margin-top: 25px">{{__('category.Create_category')}}</button>
            </form>
        </div>
    </div>
</div>

@endsection
