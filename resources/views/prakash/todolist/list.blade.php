@extends('prakash.todolist.app')
@section('content')
    @if(isset($task))
        <h3>Edit : </h3>
        <form method="POST" action="{{ route('task.update', $task->id) }}">
            @method('PATCH')
    @else
        <h3>Add New Task : </h3>
        <form method="POST" action="{{ route('task.store') }}">
    @endif
        @csrf
        <div class="form-inline">
            <div class="form-group">
                <input type="text" name="name" class="form-control" value="{{ isset($task) ? $task->name : '' }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">{{ $submit }}</button>
            </div>
        </div>
    </form>
    <hr>
    <h4>Tasks To Do : </h4>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>
                        <form method="POST" action="{{ route('task.destroy', $task->id) }}">
                            @csrf
                            @method('DELETE')
                            <div class='btn-group'>
                                <a href="{{ route('task.edit', $task->id) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

