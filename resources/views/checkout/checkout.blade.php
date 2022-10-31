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
                <form method="post" action="{{route('checkout.create')}}" >
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}">
                    </div>

                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control" placeholder="Surname" name="surname" value="{{old('surname')}}">
                    </div>
                    <div class="form-group" style="margin-top: 25px">
                        <label>Phone</label>
                        <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{old('phone')}}">
                    </div>
                    <div class="form-group" style="margin-top: 25px">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                    </div>
                    <div class="form-group" style="margin-top: 25px">
                        <label>Country</label>
                        <input type="text" class="form-control" placeholder="Country" name="country" value="{{old('country')}}">
                    </div>
                    <div class="form-group" style="margin-top: 25px">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" name="city" value="{{old('city')}}">
                    </div>
                    <div class="form-group" style="margin-top: 25px">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Adress" name="address" value="{{old('address')}}">
                    </div>

                    <div class="form-group" style="margin-top: 25px">
                        <label>Notes</label>
                        <textarea class="form-control" rows="3" name="notes" >{{old('notes')}}</textarea>
                    </div>
                    <button type="submit" style="margin-top: 25px">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
