@extends('backend.layout.layout')

@section('space-work')
<div class="card">
  <div class="card-header">
    Course Add
  </div>
  <div class="card-body">
    <form action="{{route('courses.store')}}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Name</label>
                <input type="text" style="border: 1px solid black;" class="form-control" id="inputName" placeholder="Name" name="name" value="{{old('name')}}">
                @error('name')  <span style='color:red'>{{$errors->first('name')}}</span>  @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="inputSyllabus">Syllabus</label>
              <textarea class="form-control" id="inputSyllabus" placeholder="Syllabus" name="syllabus" >{{old('syllabus')}}</textarea>
              @error('syllabus')  <span style='color:red'>{{$errors->first('syllabus')}}</span>  @enderror
            </div>
            
            <div class="form-group col-md-6">
              <label for="inputDuration">Duration</label>
              <input type="tel" class="form-control" id="inputDuration" placeholder="Duration" name="duration" value="{{old('duration')}}"> months
              @error('duration')  <span style='color:red'>{{$errors->first('duration')}}</span>  @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="inputFee">Fee</label>
              <input type="text" class="form-control" id="inputFee" placeholder="Fee" name="fee" value="{{old('fee')}}">
              @error('fee')  <span style='color:red'>{{$errors->first('fee')}}</span>  @enderror
            </div>
      
        
       
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ url()->previous() }}">Back</a>
      </form>
    

  </div>
</div>
@endsection
