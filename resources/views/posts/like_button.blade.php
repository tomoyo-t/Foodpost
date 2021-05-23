    @if (Auth::id() != $user->post_id)
        @if (Auth::user()->is_like($post->id))
            {!! Form::open(['route' => ['like.unlike', $post->id], 'method' => 'delete']) !!}
                {!! Form::submit('Unlike', ['class' => "btn btn-success btn-sm mb-1"]) !!}
            {!! Form::close() !!}
        @else
            {!! Form::open(['route' => ['like.like', $post->id]]) !!}
                {!! Form::submit('Like!!', ['class' => "btn font-weight-bold btn-sm mb-1"]) !!}
            {!! Form::close() !!}
        @endif
    @endif
