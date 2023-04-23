@extends('layout.main')

@section('title','Edit task')

@section('content')

  <div class="container py-3">
    <h2>Edit task</h2>
    <form action="/tasks/{{$tasks->id}}" method="post">
        @method('PUT')
        @csrf 
        
        
        <div class="form-group">
            <label for="name">Task name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" 
            name="name" placeholder=""
            value="{{ old('name', $tasks["name"]) }}">
            @error('name')
                <div class="invalid-feedback">
                    Please give a correct coursename. It has at least 5 characters.
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" 
            name="description" rows="3" placeholder="Describe the task">{{ old('name', $tasks["description"]) }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    Please write out description.
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="points">Point</label>
            <input type="text" class="form-control @error('points') is-invalid @enderror" 
            name="points" placeholder=""
            value="{{ old('name', $tasks["points"]) }}">
            @error('points')
                <div class="invalid-feedback">
                    Please give a point 
                </div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Task</button>
        </div>
    </form>
  </div>

  @endsection