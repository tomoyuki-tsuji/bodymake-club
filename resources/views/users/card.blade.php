<div class="card">
    <div class="card-body">
        <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
    </div>
    <div class="card-footer">
        <h3 class="card-title">{{ $user->name }}</h3>
    </div>
        {!! link_to_route('microposts.create', '新規投稿', null, ['class' => 'btn btn-warning', 'btm-sm']) !!}
</div>