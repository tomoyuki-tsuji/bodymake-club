@if (Auth::user()->is_favorites($micropost->id))
        {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
            {!! Form::submit('取り消し', ['class' => "btn btn-warning btn-sm"]) !!}
        {!! Form::close() !!}
    @else    
        {!! Form::open(['route' => ['favorites.favorite', $micropost->id]]) !!}
            {!! Form::submit('いいね', ['class' => "btn btn-success btn-sm"]) !!}
        {!! Form::close() !!}
@endif