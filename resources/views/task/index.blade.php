@extends('task.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Task</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('home') }}"> Home</a>
                <a class="btn btn-success" href="{{ route('task.create') }}"> Create New Task</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($task as $tsk)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $tsk->title }}</td>
            <td>{{ $tsk->description }}</td>
            <td>
                <form action="{{ route('task.destroy',$tsk->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('task.show',$tsk->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('task.edit',$tsk->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $task->links() !!}

@endsection
