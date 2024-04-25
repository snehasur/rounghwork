@extends('backend.layout.layout')

@section('space-work')    
<div class="card">
    <div class="card-header">
        Batch View
    </div>
    <div class="card-body">
        <h5 class="card-title">Name:{{$data->name}}</h5>
        <p class="card-text">Course Name:{{$data->course->name}}</p>
        <p class="card-text">Teacher Name:{{$data->teacher->name}}</p>
        <p class="card-text">Start Date:{{$data->start_date}}</p>
    </div> 
</div>
<a href="{{ url()->previous() }}">Back</a>
@endsection
