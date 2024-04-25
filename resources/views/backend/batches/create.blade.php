@extends('backend.layout.layout')

@section('space-work')
<div class="card">
  <div class="card-header">
    Batch Add
  </div>
  <div class="card-body">
    <form action="{{route('batches.store')}}" method="post">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Name</label>
                <input type="text" style="border: 1px solid black;" class="form-control" id="inputName" placeholder="Name" name="name" value="{{old('name')}}">
                @error('name')  <span style='color:red'>{{$errors->first('name')}}</span>  @enderror
            </div>
           <div class="form-group col-md-6">
              <label for="inputCourseName">Course Name</label>
              <select name="course_id" id="inputCourseName" class="form-control">
              @foreach($courses as $course)
                <option value="{{$course->id?$course->id:old('course_id')}}">{{$course->id?$course->name:old('course_id')}}</option>
              @endforeach
              </select>
             
              @error('course_id')  <span style='color:red'>{{$errors->first('course_id')}}</span>  @enderror
            </div>
            
            <div class="form-group col-md-6">
              <label for="inputTeacherName">Teacher Name</label>
              <select name="teacher_id" id="inputTeacherName" class="form-control">
              @foreach($teachers as $teacher)
                <option value="{{$teacher->id?$teacher->id:old('teacher_id')}}">{{$teacher->id?$teacher->name:old('teacher_id')}}</option>
              @endforeach
              </select>
             
              @error('teacher_id')  <span style='color:red'>{{$errors->first('teacher_id')}}</span>  @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="inputStartDate">Start Date</label>
              <input type="text" class="form-control" id="inputStartDate" placeholder="StartDate" name="start_date" value="{{old('start_date')}}">
              @error('start_date')  <span style='color:red'>{{$errors->first('start_date')}}</span>  @enderror
            </div> 
      
        
       
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ url()->previous() }}">Back</a>
      </form>
    

  </div>
</div>
@endsection
