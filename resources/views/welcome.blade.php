@extends('layouts.app')

@section('content')
    @if (Auth::check())
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 500) }}" alt="">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    {!! link_to_route('microposts.create', '新規投稿', null, ['class' => 'btn btn-warning', 'btm-sm']) !!}
                </div>
            </div>
            <div class="col-sm-8">
                @if (count($microposts) > 0)
                    @include('microposts.microposts', ['microposts' => $microposts])
                @endif
            </div>
        </div>
    </div>
    @else
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                    会員ログイン
                    </div>
                    <div class="card-body">
                        
                        {!! Form::open(['route' => 'login.post']) !!}
                           <div class="form-group">
                               {!! Form::label('email', 'メールアドレス') !!}
                               {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                           </div>
                           
                           <div class="form-group">
                               {!! Form::label('password', 'パスワード') !!}
                               {!! Form::password('password', ['class' => 'form-control']) !!}
                           </div>
                           {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-sm']) !!}
                       {!! Form::close() !!}
                       
                    <p class="text-center">登録まだの方は</p>
                    <p class="text-center">{!! link_to_route('signup.get', '新規会員登録') !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <img class="img-fluid" src="training4.jpg" alt="">
            </div>
        </div><!--row-->
    </div>
    @endif
@endsection