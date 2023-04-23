@extends('layout.main')

@section('title','Edit subjects')

@section('content')

  <div class="container py-3">
    <h2>Edit subject</h2>
    <form action="/subjects/{{$subject["id"]}}" method="post">
        @method('PUT')
        @csrf 
        
        
        <div class="form-group">
            <label for="name">Subject name</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" 
            name="title" placeholder="Ex: Programming"
            value="{{ old('title', $subject["title"]) }}">
            @error('title')
                <div class="invalid-feedback">
                    Please give a correct coursename. It has at least 3 characters.
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" 
            name="description" rows="3" placeholder="Describe the subject"
            >{{ old('description', $subject["description"]) }}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    Please write out description.
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image_url">Subject code</label>
            <input type="text" class="form-control @error('code') is-invalid @enderror" 
            name="code" placeholder="Ex: IK-ABC123"
            value="{{ old('code', $subject["code"]) }}">
            @error('code')
                <div class="invalid-feedback">
                    Please give a correct subject code. It has 'IK-SSSNNN' format, where S is a capital from the English alphabet, and N is number.
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image_url">Subject credit</label>
            <input type="text" class="form-control @error('credit') is-invalid @enderror" name="credit" placeholder=""
            value="{{ old('credit', $subject["credit"]) }}">
            @error('credit')
                <div class="invalid-feedback">
                    Please give the subject credit.
                </div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update subject</button>
        </div>
    </form>
  </div>

  @endsection