@extends('layouts.app')

@section('content')
    <div class="detail">
        <div id="detail">
            <i class="far fa-user"></i>
            {{ Auth::user()->name }}
        </div>
        <div class="col-12">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="{{ route('user.index',[]) }}" class="nav-link  text-dark active">Post</a></li>
                <li class="nav-item"><a href="{{ route('user.show',[]) }}" class="nav-link text-dark">Like</a></li>
            </ul>
        </div>
    </div>
    <div class="main">
        @include('posts.posts')
    </div>
@endsection
