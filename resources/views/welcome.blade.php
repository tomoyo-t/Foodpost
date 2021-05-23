@extends('layouts.app')

@section('content')
    <div class="main">
        <div class="main_caption text-center">
            <h1>Food Post</h1><br>
            <p>日本で食べられる各国のおいしいお店をシェアしよう！</p>
            <p>母国の味・誰かに食べてほしい味・おすすめしたいお店など</p><br>
        </div>
        <img class="imag_main" src="image/main_visual.jpg" alt="メイン画像">
    </div>
    @if (Auth::check())
        <div class="col-sm-6 offset-sm-3">
            <a href="{{ route('posts.form') }}" class="btn btn outline btn-lg btn-block">Post</a>
        </div>
        <div class="main">
            @include('posts.posts')
        </div>
    @else
        <div id="main">
            {!! link_to_route('signup.get', 'SIGN UP', [], ['class' => 'btn btn outline btn-lg text-dark  w-25 h-50']) !!}
            {!! link_to_route('login', 'LOGIN', [], ['class' => 'btn btn outline btn-lg text-dark  w-25']) !!}
        </div>
    @endif
@endsection