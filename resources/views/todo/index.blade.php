@extends('app')

@section('content')
<body>
<div class="container">
<h2 class="page-header">ToDo一覧</h2>
    <p class="pull-right"><a class="btn btn-success" href="/todo/create">追加</a></p>
<table class="table table-hover todo-table">
    <thead>
    <tr>
        <th>やること</th>
        <th>作成日時</th>
        <th>更新日時</th>
        <th></th>
        <th></th>
    </tr>
    </thead>
    <tbody class="table-hover">
    @foreach($todos as $todo)
    <tr>
        <td>{{ $todo->title }}</td>
        <td>{{ $todo->created_at }}</td>
        <td>{{ $todo->updated_at }}</td>
        <td><a class="btn btn-info" href="/todo/{{ $todo->id }}/edit">編集</a></td>
        {!! Form::open(['route'=>['todo.destroy',$todo->id],'method'=>'DELETE']) !!}
        <td>
            <button class="btn btn-danger" type="submit">削除</button>
        </td>
        {!! Form::close() !!}
    </tr>
    @endforeach
</tbody>
</table>
</div>
@endsection
