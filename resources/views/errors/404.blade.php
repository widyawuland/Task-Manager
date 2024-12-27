@extends('layouts.main')

@section('content')
    <h1>404 Not Found</h1>
    <p>The page you are looking for does not exist.</p>
    <a href="{{ route('tasks.index') }}" class="btn btn-primary">Go to Task List</a>
@endsection
