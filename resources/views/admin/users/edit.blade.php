@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">edit {{ $user->name }}</div>

                <div class="card-body">
    <form action=" {{ route('admin.users.update', $user) }}" method="post">
                @csrf {{ method_field('PUT') }}


                @foreach ($roles as $role)
                <div class="form-check">
    <input type="checkbox" name="roles[]" value="{{ $role->id }}" @if($user->roles->contains($role->id)) checked=checked @endif/>
    <label>{{ $role->roleName }}</label>
                </div>
                @endforeach

<div class="form-group">
        <input type="text" name = "name" id = "name" class="form-control" required value = "{{$user->name}}">
        </div>

        <div class="form-group">
        <input type="text" name = "email" id = "email" class="form-control" required value = "{{$user->email}}">
        </div>

        <div class="form-group">
        <input type="text" name = "password" id = "password" class="form-control" required value = "{{$user->password}}">
        </div>




        <button type = "submit" class = "btn btn-success">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
