@extends('layouts.app')

@section('content')
    <div class="detail">
        <div id="detail">
            <i class="far fa-user"></i>{{ $post->user->name }}
        </div>
        <table class="table table-borderless">
            <img src="{{ $post->photo }}">
            <tr>
                <Th>Country</Th>
            </tr>
            <tr>
                <td><p class="mb-1 text-center">{!! nl2br(($post->country_id)) !!}</p><td>
            </tr>
            <tr>
                <Th>Store information</Th>
            </tr>
            <tr>
                <td><p class="mb-1 text-center">{!! nl2br(($post->store_information)) !!}</p><td>
            </tr>
            <tr>
                <Th>Comment</Th>
            </tr>
            <tr>
                <td><p class="mb-1 text-center">{!! nl2br(($post->comment)) !!}</p><td>
            </tr>
        </table>
        @if (Auth::id() == $post->user_id)
            {!! link_to_route('posts.edit', 'Edit', ['post' => $post->id], ['class' => 'btn btn outline text-dark  w-25 h-50 mb-1']) !!}
            {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn btn outline text-dark  w-25 h-50']) !!}
            {!! Form::close() !!}
        @endif
    </div>
@endsection