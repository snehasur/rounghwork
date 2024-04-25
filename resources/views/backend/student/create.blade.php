@extends('backend.layout.layout')

@section('space-work')
<div class="card">
  <div class="card-header">
    Student Add
  </div>
  <div class="card-body">
    <form action="{{route('admin.students.store')}}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Name</label>
                <input type="text" style="border: 1px solid black;" class="form-control" id="inputName" placeholder="Name" name="name" value="{{old('name')}}">
                @error('name')  <span style='color:red'>{{$errors->first('name')}}</span>  @enderror
            </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email" value="{{old('email')}}">
            @error('email')  <span style='color:red'>{{$errors->first('email')}}</span>  @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="inputPhone">Phone</label>
            <input type="tel" class="form-control"  maxlength="11" minlength="11" id="inputPhone" placeholder="Phone" name="phone" value="{{old('phone')}}">
            @error('phone')  <span style='color:red'>{{$errors->first('phone')}}</span>  @enderror
          </div>
        <div class="form-group col-md-6">
          <label for="inputAddress">Address</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="address" value="{{old('address')}}">
          @error('address')  <span style='color:red'>{{$errors->first('address')}}</span>  @enderror
        </div>
      
        
       
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ url()->previous() }}">Back</a>
      </form>
    

  </div>
</div>
@endsection
