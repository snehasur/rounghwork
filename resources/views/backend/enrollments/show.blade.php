@extends('backend.layout.layout')

@section('space-work')    
<div class="card">
    <div class="card-header">
        Enrollment View
    </div>
    <div class="card-body">
        <h5 class="card-title">Enroll No:{{$data->enroll_no}}</h5>
        <p class="card-text">Batch Name:{{$data->batch->name}}</p>
        <p class="card-text">Student Name:{{$data->student->name}}</p>
    </div> 
</div>
<a href="{{ url()->previous() }}">Back</a>
@endsection
