@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin User Control</div>

                <div class="card-body text-center">
                    @foreach($users as $user)
                    <!--loops over all roles and prints them out separated by a comma-->
<h1>{{ implode(', ', $user->roles()->get()->pluck('roleName')->toArray()) }}</h1>
<h2>{{ $user->name }}</h2> <h3> {{ $user->email }}</h3>  <a href="{{ route('admin.users.edit', $user->id) }}"><button class="btn spring-warmth-gradient btn-sm">Edit</button></a>
<form action="{{ route('admin.users.destroy', $user) }}" method="POST">
@csrf
{{ method_field('DELETE') }}
<button type="submit" class="btn btn-danger">Delete</button>
</form>

<hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
