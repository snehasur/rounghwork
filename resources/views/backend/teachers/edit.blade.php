@extends('backend.layout.layout')

@section('space-work')
<div class="card">
  <div class="card-header">
    Teacher Update
  </div>
  <div class="card-body">
    <form action="{{route('teachers.update',$data->id)}}" method="post">
        @csrf
        @method('Patch')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Name</label>
                <input type="text" style="border: 1px solid black;" class="form-control" id="inputName" placeholder="Name" name="name" value="{{$data->name?$data->name:old('name')}}">
                @error('name')  <span style='color:red'>{{$errors->first('name')}}</span>  @enderror
            </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" disabled name="email" value="{{$data->email?$data->email:old('email')}}">
            @error('email')  <span style='color:red'>{{$errors->first('email')}}</span>  @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="inputPhone">Phone</label>
            <input type="tel" class="form-control" id="inputPhone" placeholder="Phone" name="phone" value="{{$data->phone?$data->phone:old('phone')}}" maxlength="11" minlength="11">
            @error('phone')  <span style='color:red'>{{$errors->first('phone')}}</span>  @enderror
          </div>
        <div class="form-group col-md-6">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" value="{{$data->address?$data->address:old('address')}}">
          @error('address')  <span style='color:red'>{{$errors->first('address')}}</span>  @enderror
        </div>
      
        
       
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        
        </form>
        <form action="{{ url('/admin/teachers/'.$data->id) }}" method="post">@csrf
          @method('DELETE')
          <button class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure?')" data-toggle="tooltip" type="submit">Delete</button>
        </form>
        <a href="{{ url()->previous() }}">Back</a>
    

  </div>
</div>
@endsection
