@extends('layout')

@section('title', '一覧')

@section('content')

<table class="striped">
    <thead>
        <tr>
            <th>Id</th>
            <th>NO</th>
            <th>TITLE</th>
            <th>RELEASE</th>
            <th>Link</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($results as $val)
            <tr>
                <td> {{ $val -> id }} </td>
                <td> {{ $val -> no }} </td>
                <td> {{ $val -> title }} </td>
                <td> {{ $val -> release_date }} </td>
                <td>
                    {{Html::linkAction('NovelController@edit', 'edit', $val -> id)}}
                    {{Html::linkAction('NovelController@delete', 'delete', $val -> id)}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{Html::linkAction('NovelController@create', 'Create')}}

@endsection