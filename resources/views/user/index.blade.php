@extends('layout')

@section('title')
一覧
@endsection

@section('content')

<table class="striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>UserName</th>
            <th>MailAddress</th>
            <th>Password</th>
            <th>Link</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $val)
            <tr>
                <td> {{ $val -> id }} </td>
                <td> {{ $val -> name }} </td>
                <td> {{ $val -> mailaddress }} </td>
                <td> {{ $val -> password }} </td>
                <td>
                    {{Html::linkAction('UserController@edit', 'edit', $val -> id)}}
                    {{Html::linkAction('UserController@delete', 'delete', $val -> id)}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{Html::linkAction('UserController@create', 'Sign in')}}

@endsection