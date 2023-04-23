@extends('layout.main')

@section('title', 'Task overview')

@section('content')

      <a href="/subjects/{{$showtask["id"]}}/tasks/create" class="btn btn-primary">Add new task</a>
      
      <table class="table table-hover table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Task name</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                @foreach($showtask->tasks as $task)
                    <tr>
                        <td>
                            <a href="/tasks/{{$task["id"]}}">
                                {{$task->name}}
                            <a>
                        </td>
                        <td>{{$task->points}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection