@if (count($posts) > 0)
    @foreach ($posts as $post)
        <div class="item">
            <a href="{{ route('posts.show', $post->id,) }}"><img src="{{ $post->photo }}"></a>
            <p class="mb-1 ml-4">{!! nl2br(($post->country_id)) !!}</p>
            <p class="mb-1"><i class="far fa-user"></i>
            <span class="mb-1 ml-1">{!! nl2br(($post->user->name)) !!}</span>
            <p class="comment mb-1 ml-4">{!! nl2br(($post->comment)) !!}</p>
                @include('posts.like_button')
                @if (Auth::id() == $post->user_id)
                
                    {!! link_to_route('posts.edit', 'Edit', ['post' => $post->id], ['class' => 'btn font-weight-bold text-center btn-sm mb-1']) !!}
                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                @endif
        </div>
    @endforeach
@endif