@extends('backend.layout.layout')

@section('space-work')    
<div class="card">
    <div class="card-header">
        Student View
    </div>
    <div class="card-body">
        <h5 class="card-title">Name:{{$student->name}}</h5>
        <p class="card-text">Email:{{$student->email}}</p>
        <p class="card-text">Password:{{$student->password}}</p>
        <p class="card-text">Phone No:{{$student->phone}}</p>
        <p class="card-text">Address:{{$student->address}}</p>       
    </div> 
</div>
<a href="{{ url()->previous() }}">Back</a>
@endsection
