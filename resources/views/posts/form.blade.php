@extends('layouts.app')
@section('content')
    <div class="text-center">
        <h1>POST</h1>
    </div>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(['route' => 'posts.store', 'files' => true ]) !!}
                <div class="form-group">
                    {!! Form::label('country_id', 'Country') !!}
                    {!! Form::select('country_id', config('country_list'),[],['class' => 'btn btn-outline btn-block text-secondary',  'placeholder' => '選択してください']) !!}                    
                </div>
                
                <div class="form-group">
                    {!! Form::label('store_information', 'Store information') !!}
                    {!! Form::text('store_information', null, ['class' => 'form-control','placeholder' => '例：東京都新宿区新宿1-1-1']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('comment', 'Comment') !!}
                    {!! Form::textarea('comment', null, ['class' => 'form-control','placeholder' => '・30字以内で入力してください']) !!}
                </div>
                
                {!! Form::label('photo', 'Photo') !!}
                <div class="form-group">
                    {!! Form::file('photo', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('Post', ['class' => 'btn btn outline btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection