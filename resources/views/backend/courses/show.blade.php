@extends('backend.layout.layout')

@section('space-work')    
<div class="card">
    <div class="card-header">
        Course View
    </div>
    <div class="card-body">
        <h5 class="card-title">Name:{{$data->name}}</h5>
        <p class="card-text">Syllabus:{{$data->syllabus}}</p>
        <p class="card-text">Duration:{{$data->duration()}}</p>
        <p class="card-text">Fee:{{$data->fee}}</p>        
    </div> 
</div>
<a href="{{ url()->previous() }}">Back</a>
@endsection
