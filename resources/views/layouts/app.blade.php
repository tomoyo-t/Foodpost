<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Food Post</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('/css/my_style.css') }}">
        
    </head>
    <body>
        <div class="footerFixed">
            @include('commons.navbar')
    
            <div class="container">
                @include('commons.error_messages')
                @yield('content')
            </div>
            <footer>
                <div id="footer_navi">
                    <ul>
                        <li>{!! link_to_route('user.index', 'My pafe', ['user' => Auth::id()], ['class' => 'text-secondary']) !!}</li>
                        <li><a href="{{ route('posts.form') }}" class="text-secondary">Post</a></li>
                    </ul>
                </div>
                <small>&copy; 2021 Tomoyo Takahashi.</small>
            </footer>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>