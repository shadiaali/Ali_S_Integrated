@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid" style="text-align:center;background-color:#ffffff;">
                        @include('partials.search')

    <h1>Posts List</h1><hr>
<table class="table table-striped table-responsive-md btn-table text-center">
                <thead>
                    <tr>
                        <th scope="row"><h4>Id</h4></th>
                        <th scope="row"><h4>Title</h4></th>
                        <th scope="row"><h4>View</h4></th>

                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('post.show', $post->id) }}" class="btn spring-warmth-gradient btn-lg">Show Post</a>
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div></div>
@endsection
