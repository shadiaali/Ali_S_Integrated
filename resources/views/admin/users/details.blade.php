@extends('layouts.app')

@section('content')

<div class="container">


<div class="jumbotron card card-image mt-4 rare-wind-gradient" style="height:100%;">
<div class="text-white text-center row">

    <div class="col">

    <h1>{{ $user->name }}</h1>
    <hr>
    <h4 class="text-left"><b>User ID Number:</b>  {{ $user->id }}</h4>
    <h4 class="text-left"><b>Email</b> {{ $user->email }}</h4>
    <h4 class="text-left"><b>Role</b> {{ implode(', ', $user->roles()->get()->pluck('roleName')->toArray()) }}</h4>



    </div>

</div><div class="container justify-content-center text-center"><a onclick="goBack()" class="text-white btn spring-warmth-gradient btn-lg"> Go back</a><div>
</div>

<script>
function goBack() {
window.history.back();
}
</script>



            @endsection
