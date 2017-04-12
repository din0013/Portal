@extends('layout')

@section('title')
編集
@endsection

@section('content')

{{Form::open(['url' => 'user/register', 'method'=>'post'])}}
    <div class="form-group">
        {{Form::label('UserName', 'ユーザ名', ['data-error' => 'wrong', 'data-success' => 'success', 'class' => 'form-control validate'])}}
        {{Form::text('UserName', isset($results) ? $results -> username : null, ['class' => 'form-control validate', 'required' => 'required', 'aria-required' => 'true'])}}
        @foreach($errors->get('UserName') as $message)
            <p class="red-text text-accent-3">{{ $message }}</p>
        @endforeach
    </div>

    <div class="form-group">
        {{Form::label('MailAddress', 'メールアドレス', ['data-error' => 'wrong', 'data-success' => 'success', 'class' => 'form-control validate'])}}
        {{Form::email('MailAddress', isset($results) ? $results -> username : null, ['class' => 'form-control validate', 'required' => 'required', 'aria-required' => 'true'])}}
        @foreach($errors->get('MailAddress') as $message)
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