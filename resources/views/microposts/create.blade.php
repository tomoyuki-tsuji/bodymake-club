@extends('layouts.app')

@section('content')
    <h1>投稿</h1>
    <div class="row">
        <div class="col-6">
            {!! Form::model($micropost, ['route' => 'microposts.store', 'enctype' => 'multipart/form-data']) !!}
            
                <div class="form-group">
                    {!! Form::label('content', '内容・レビュー:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('picture', '写真:') !!}
                    {!! Form::file('picture', null, ['class' => 'file']) !!}
                </div>
        
                {!! Form::submit('投稿', ['class' => 'btn btn-warning', 'btn-sm']) !!}
            {!! Form::close() !!}
        </div>
    </div
@endsection