@extends('backend.layout.layout')

@section('space-work')
<div class="card">
  <div class="card-header">
    Admin Update
  </div>
  <div class="card-body">
    <form action="{{route('dashboard.update',$data->id)}}" method="post">
        @csrf
        @method('Patch')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Name</label>
                <input type="text" style="border: 1px solid black;" class="form-control" id="inputName" placeholder="Name" name="name" value="{{$data->name?$data->name:old('name')}}">
                @error('name')  <span style='color:red'>{{$errors->first('name')}}</span>  @enderror
            </div>
            
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        
        </form>
        <a href="{{ url()->previous() }}">Back</a>
    

  </div>
</div>
@endsection
