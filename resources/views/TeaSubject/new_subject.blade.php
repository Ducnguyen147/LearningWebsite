@extends('layout.main')

@section('title','Create new subject')

@section('content')

  <div class="container py-3">
    <h2>Create a new subject</h2>
    <form action="" method="post">
        @csrf 
        
        
        <div class="form-group">
            <label for="title">Subject name</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" 
            name="title" placeholder="Ex: Programming"
            >
            @error('title')
                <div class="invalid-feedback">
                    Please give a correct coursename. It has at least 3 characters.
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" 
            name="description" rows="3" placeholder="Describe the subject"></textarea>
            @error('description')
                <div class="invalid-feedback">
                    Please write out description.
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="code">Subject code</label>
            <input type="text" class="form-control @error('code') is-invalid @enderror" 
            name="code" placeholder="Ex: IK-ABC123">
            @error('code')
                <div class="invalid-feedback">
                    Please give a correct subject code. It has 'IK-SSSNNN' format, where S is a capital from the English alphabet, and N is number.
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="credit">Subject credit</label>
            <input type="text" class="form-control @error('credit') is-invalid @enderror" name="credit" placeholder="">
            @error('credit')
                <div class="invalid-feedback">
                    Please give the subject credit.
                </div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add new subject</button>
        </div>
    </form>
  </div>

  @endsection