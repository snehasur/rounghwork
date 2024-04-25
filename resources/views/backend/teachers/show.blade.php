@extends('backend.layout.layout')

@section('space-work')    
<div class="card">
    <div class="card-header">
        Teacher View
    </div>
    <div class="card-body">
        <h5 class="card-title">Name:{{$data->name}}</h5>
        <p class="card-text">Email:{{$data->email}}</p>
        <p class="card-text">Password:{{$data->password}}</p>
        <p class="card-text">Phone No:{{$data->phone}}</p>
        <p class="card-text">Address:{{$data->address}}</p>       
    </div> 
</div>
<a href="{{ url()->previous() }}">Back</a>
@endsection
