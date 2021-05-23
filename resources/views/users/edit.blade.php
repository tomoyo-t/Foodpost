@extends('layouts.app')
@section('content')
    <div class="text-center my-4">
        <h1>POSTの編集</h1>
    </div>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <tr>
                <Th>Country</Th>
            </tr>
            <tr>
                <td><p class="mb-4 text-center">{!! nl2br(($post->country_id)) !!}</p><td>
            </tr>
            
            {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'put']) !!}
                
                <div class="form-group mb-4">
                    {!! Form::label('store_information', 'Store information') !!}
                    {!! Form::text('store_information', null, ['class' => 'form-control','placeholder' => '例：東京都新宿区新宿1-1-1']) !!}
                </div>
                
                <div class="form-group mb-4">
                    {!! Form::label('comment', 'Comment') !!}
                    {!! Form::textarea('comment', null, ['class' => 'form-control','placeholder' => '・40字以内で入力してください']) !!}
                </div>
                <img src="{{ $post->photo }}">
                
                {!! Form::submit('Update', ['class' => 'btn btn outline btn-block mt-4']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection