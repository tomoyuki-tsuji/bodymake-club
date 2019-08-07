<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-light"> 
        <a class="navbar-brand" href="/">ボディメイクClub</a>
        <ul class="nav">
            <li class="nav-item nav-link">{!! link_to_route('welcome', 'トップ', [],  ['style' => 'color: rgba(0,0,0,.5)']) !!}</li>
            <li class="nav-item nav-link">{!! link_to_route('overview', 'ボディメイクClubとは', [], ['style'=>'color: rgba(0,0,0,.5)']) !!}</li>
        </ul>
         
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
                            <li class="dropdown-item">{!! link_to_route('users.favorites','お気に入り一覧', ['id'=>Auth::id()], ['style' => 'color: black']) !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('users.index', 'ユーザー', ['class' => 'nav-link'], ['style' => 'color: black']) !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト', [],  ['style' => 'color: black']) !!}</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item">
                                {!! Form::open(['route' => ['users.destroy', Auth::id()], 'method' => 'delete']) !!}
                                     {!! Form::submit('退会', ['class' => 'btn btn-outline-danger']) !!}
                                {!! Form::close() !!}</li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">{!! link_to_route('login', 'マイページ', [], ['class' => 'nav-link']) !!}</li>
                @endif
                </div>
            </ul>
        </div>
    </nav>
</header>