@extends('frontend.layout.layout')
@section('space-work')
<div class="card">
  <div class="card-header">
    Student Update
  </div>
  <div class="card-body">
    <form action="{{route('students.update',$student->id)}}" method="post">
        @csrf
        @method('Patch')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Name</label>
                <input type="text" style="border: 1px solid black;" class="form-control" id="inputName" placeholder="Name" name="name" value="{{$student->name?$student->name:old('name')}}">
                @error('name')  <span style='color:red'>{{$errors->first('name')}}</span>  @enderror
            </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" disabled class="form-control" id="inputEmail4" placeholder="Email" name="email" value="{{$student->email?$student->email:old('email')}}">
            @error('email')  <span style='color:red'>{{$errors->first('email')}}</span>  @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Password</label>
            <input type="text" disabled class="form-control" id="inputPassword4" placeholder="Password" name="password" value="{{$student->password?$student->password:old('password')}}">
            @error('password')  <span style='color:red'>{{$errors->first('password')}}</span>  @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="inputPhone">Phone</label>
            <input type="tel" class="form-control" id="inputPhone" placeholder="Phone" name="phone" value="{{$student->phone?$student->phone:old('phone')}}" maxlength="11" minlength="11">
            @error('phone')  <span style='color:red'>{{$errors->first('phone')}}</span>  @enderror
          </div>
        <div class="form-group col-md-6">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" value="{{$student->address?$student->address:old('address')}}">
          @error('address')  <span style='color:red'>{{$errors->first('address')}}</span>  @enderror
        </div>
      
        
       
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        {{-- <form action="{{ url('/students/'.$student->id) }}" method="post">@csrf
          @method('DELETE')
          <button class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure?')" data-toggle="tooltip" type="submit">Delete</button>
        </form>
        </form> --}}
        <a href="{{ url()->previous() }}">Back</a>
    

  </div>
</div>
@endsection
