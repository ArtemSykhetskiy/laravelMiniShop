@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-12">

                <form method="post" action="{{route('profile.update', $user)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label>Surname</label>
                        <input type="text" class="form-control" placeholder="Surname" name="surname" value="{{$user->surname}}">
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{$user->phone}}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="Email" name="email" value="{{$user->email}}">
                    </div>
                    <div class="form-group">
                        <label>Birthdate</label>
                        <input type="date" class="form-control" placeholder="Birthdate" name="birthdate" value="{{$user->birthdate}}" disabled>
                    </div>
                    <button type="submit" style="margin-top: 25px">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection
