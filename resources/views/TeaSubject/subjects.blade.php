@extends('layout.main')

@section('title','Teacher homepage')

@section('content')
    <div class="jumbotron">
        <h1 class="display-15">Welcome {{ Auth::user()->name }}! You are logged in as a Teacher</h1>
        <p class="lead">You can review your published courses, delete or create a new course below.</p>
    </div>
    
    <div class="container">
        <div class="row">
        
        @foreach ($subjects as $subject)
        <div class="col-sm-3 my-3">
            <div class="card h-100">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="/subjects/{{$subject["id"]}}">
                        {{$subject["title"]}}
                    </a>
                </h5>
                <p class="card-text">Overview: {{$subject["description"]}}</p>
                <p class="card-text">Code: {{$subject["code"]}}</p>
                <p class="card-text">Credit: {{$subject["credit"]}}</p>
                <a href="/subjects/{{$subject["id"]}}/tasks" class="btn btn-primary">View Tasks</a>
                <a href="/subjects/{{$subject["id"]}}/edit" class="btn btn-secondary">Edit</a>
                <form action="/subjects/{{$subject["id"]}}" method="post">
                    @csrf
                    @method("delete")
                    <button type="submit" class="btn btn-secondary" style="display: inline-block">Delete</button>
                </form>
            </div>
            </div>
        </div>
        @endforeach

        <div class="col-sm-3 my-3">
            <div class="card h-100 text-center">
            <a href="/subjects/create" class="btn btn-secondary h-100 d-flex flex-column justify-content-center align-items-center">
                <i class="fas fa-plus-circle fa-3x mb-2"></i>
                <span>Create a new subject</span>
            </a>
            </div>
        </div>
        
        </div>
    </div>
    @endsection