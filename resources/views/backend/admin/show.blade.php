@extends('backend.layout.layout')

@section('space-work')    
<div class="card">
    <div class="card-header">
        Admin View
    </div>
    <div class="card-body">
        <h5 class="card-title">Name:{{$data->name}}</h5>
        <p class="card-text">Email:{{$data->email}}</p>
        <p class="card-text">Password:{{$data->password}}</p>
    </div> 
</div>
<a href="{{ url()->previous() }}">Back</a>
@endsection
