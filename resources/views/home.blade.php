@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in! Welcome to your Dash.

                </div>
            </div>
        </div>
    </div>
<br>
<hr>

<div class="jumbotron jumbotron-fluid" style="text-align:center;background-color:#ffffff;">


<h1>Users List</h1><hr>
<table class="table table-striped table-responsive-md btn-table">
                <thead>
                    <tr>
                        <th scope="row"><h4>Role</h4></th>
                        <th scope="row"><h4>Name</h4></th>
                        <th scope="row"><h4>Email</h4></th>
                        <th scope="row"><h4>Details</h4></th>

                    </tr>
                </thead>
                <tbody>
                                @foreach($users as $user)
                    <!--loops over all roles and prints them out separated by a comma-->



                        <td class="wow fadeIn">

                        {{ implode(', ', $user->roles()->get()->pluck('roleName')->toArray()) }}
                        </td>


                        <td class="wow fadeIn">

                        {{ $user->name }}

                        </td>

                        <td>{{ $user->email }}</td>

                        <td class="wow fadeIn"><a href="{{route('admin.users.details',['id'=>$user->id])}}"
                                class=" btn spring-warmth-gradient btn-lg  ">Details</a></td>


                    </tr>
                @endforeach
                </tbody>
            </table>
</div>

</div>




@endsection
