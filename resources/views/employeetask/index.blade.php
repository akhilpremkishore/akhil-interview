@extends('employeetask.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Employee</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('home') }}"> Home</a>
                <a class="btn btn-success" href="{{ route('employeetask.create') }}"> Create Task Assign</a>
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
            <th>Employee</th>
            <th>Task</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($employeetask as $emp)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $emp->employee->name }}</td>
            <td>{{ $emp->task->title }}</td>
            <td>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $employeetask->links() !!}

@endsection
