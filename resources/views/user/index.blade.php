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
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $val)
            <tr>
                <td> {{ $val -> id }} </td>
                <td> {{ $val -> username }} </td>
                <td> {{ $val -> password }} </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection