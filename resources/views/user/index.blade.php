@extends('layout')

@section('title')
一覧
@endsection

@section('content')

<table class="striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>UserName</th>
            <th>PASSWORD</th>
            <th>LINK</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $val)
            <tr>
                <td> {{ $val -> id }} </td>
                <td> {{ $val -> username }} </td>
                <td> {{ $val -> password }} </td>
                <td> {{Html::linkAction('UserController@edit', 'edit', $val -> id)}} </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{Html::linkAction('UserController@create', 'Sign in')}}

@endsection