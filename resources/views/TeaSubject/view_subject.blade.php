@extends('layout.main')

@section('title', 'Subject overview')

@section('content')
    <div class="container py-3">
      <h2>{{ $show->title }}</h2>
      <p><strong>Description:</strong> {{ $show->description }}</p>
        <p><strong>Subject Code:</strong> {{ $show->code }}</p>
        <p><strong>Credit Value:</strong> {{ $show->credit }}</p>
        <p><strong>Date of Creation:</strong> {{ $show->created_at }}</p>
        <p><strong>Last Modification:</strong> {{ $show->updated_at }}</p>
        <p><strong>Number of Students:</strong> ? </p>

        <h3>Students:</h3>
        {{--
        <ul class="list-group">
            @foreach($show->students as $student)
                <li class="list-group-item">
                    {{ $student->name }} ({{ $student->email }})
                </li>
            @endforeach
        </ul>
        --}}

      </div>
    </div>
@endsection