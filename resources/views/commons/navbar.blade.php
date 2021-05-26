<link rel="stylesheet" href="{{ asset('/css/my_style.css') }}">


<header>
    <div class='fixed-top'>
    <nav class="navbar navbar-expand-md navbar-dark">
        <a class="navbar-brand" href="/">Food Post</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item"><a href="{{ route('posts.form') }}" class="text-secondary">Post</a></li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('user.index', 'My Page', ['user' => Auth::id()], ['class' => 'text-secondary']) !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'Logout',[], ['class' => 'text-secondary']) !!}</li>
                        </ul>
                    </li>
                @else 
                    <li class="nav-item">{!! link_to_route('signup.get', 'SIGN UP', [], ['class' => 'nav-link']) !!}</li>
                    <li class="nav-item">{!! link_to_route('login', 'LOGIN', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
    </div>
</header>