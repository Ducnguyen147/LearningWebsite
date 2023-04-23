@extends('layout.main')

@section('title', 'Task details')

@section('content')
    <div class="container py-3">
      <h2>{{ $tasks->name }}</h2>
      <a href="{{$tasks["id"]}}/edit" class="btn btn-primary">Edit task</a>
      <form action="" method="post">
          @csrf
          @method("delete")
          <button type="submit" class="btn btn-secondary" style="display: inline-block">Delete</button>
      </form>
      <p><strong>Description:</strong> {{ $tasks->description }}</p>
        <p><strong>Points:</strong> {{ $tasks->points }}</p>
        <p><strong>Number of submitted solutions:</strong> {{$tasks->solutions->count()}} </p>
        <p><strong>Number of evaluated solutions:</strong> {{ $tasks->solutions->whereNotNull('points')->count() }} </p>

        <h3>Solutions:</h3>
        <style>
    .centered {
        text-align: center;
    }
    .button-container {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

<table class="table table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th class="centered">Date Submitted</th>
            <th class="centered">Student</th>
            <th class="centered">Email</th>
            <th class="centered">Point</th>
            <th class="centered">Evaluated At</th>
            <th class="centered">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks->solutions as $solution)
            <tr>
                <td>{{$solution->submission_date}}</td>
                <td>{{$solution->name}}</td>
                <td>{{$solution->email}}</td>
                <td>{{$solution->points}}</td>
                <td>{{$solution->evaluation_time}}</td>
                <td>
                    @if($solution->points === null || $solution->evaluation_time === null)
                    <div class="button-container">
                        <a href="/solutions/{{$solution->id}}/edit">
                            <button class="btn btn-primary">Evaluate</button>
                        </a>
                    </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



      </div>
    </div>
@endsection