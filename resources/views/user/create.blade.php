@extends('layout')

@section('title')
編集
@endsection

@section('content')

{{Form::open(['url' => 'user/register', 'method'=>'post'])}}

    <div class="form-group">
        {{Form::label('UserName', 'メールアドレス', ['class' => 'form-control'])}}
        {{Form::text('UserName', old('UserName'), ['class' => 'form-control'])}}
        @foreach($errors->get('UserName') as $message)
            <p class="red-text text-accent-3">{{ $message }}</p>
        @endforeach
    </div>

    <div class="form-group">
        {{Form::label('Password', 'パスワード')}}
        {{Form::password('Password', ['class' => 'form-control validate'])}}
        @foreach($errors->get('Password') as $message)
            <p class="red-text text-accent-3">{{ $message }}</p>
        @endforeach
    </div>

    <div class="form-group">
        {{Form::label('PasswordConfirm', 'パスワード(確認)')}}
        {{Form::password('PasswordConfirm', ['class' => 'form-control validate'])}}
        @foreach($errors->get('PasswordConfirm') as $message)
            <p class="red-text text-accent-3">{{ $message }}</p>
        @endforeach
    </div>

    <br/>

    {{Form::submit('Submit',['class' => 'btn btn-primary form-control'])}}

{{Form::close()}}

@endsection