@extends('layout.main')

@section('title', 'Solution details')

@section('content')
    <div class="container py-3">
      <h2></h2>
      <p><strong>Task description:</strong> {{ $solutions->description }}</p>
      <p><strong>Student solution:</strong> {{ $solutions->solution }}</p>

      <form action="/solutions/{{$solutions->id}}/edit" method="post">
        @method('PUT')
        @csrf 

        <div class="form-group">
              <label for="points">Point</label>
              <input type="text" class="form-control @error('points') is-invalid @enderror" 
              name="points" placeholder=""
              value="{{ old('name', $solutions["points"]) }}">
              @error('points')
                  <div class="invalid-feedback">
                      Please give a point between 0 and 10
                  </div>
              @enderror
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary">Grade the solution</button>
          </div>
        </div>
      </form>
    </div>
@endsection