@extends('backend.layout.layout')

@section('space-work')
<div class="card">
  <div class="card-header">
    Batch Update
  </div>
  <div class="card-body">
    <form action="{{route('batches.update',$data->id)}}" method="post">
        @csrf
        @method('Patch')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Name</label>
                <input type="text" style="border: 1px solid black;" class="form-control" id="inputName" placeholder="Name" name="name" value="{{$data->name?$data->name:old('name')}}">
                @error('name')  <span style='color:red'>{{$errors->first('name')}}</span>  @enderror
            </div>
           <div class="form-group col-md-6">
              <label for="inputCourseName">Course Name</label>

              <select name="course_id" id="inputCourseName" class="form-control">
                  @foreach($courses as $course)
                      <option value="{{ $course->id }}" @if($course->id == $data->course_id) selected @endif>
                          {{ $course->name }}
                      </option>
                  @endforeach
              </select>

              @error('course_id')  <span style='color:red'>{{$errors->first('course_id')}}</span>  @enderror
            </div>
            
            <div class="form-group col-md-6">
              <label for="inputTeacherName">Teacher Name</label>
              <select name="teacher_id" id="inputTeacherName" class="form-control">
              @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}" @if($teacher->id == $data->teacher_id) selected @endif>
                  {{ $teacher->name }}
                </option>
              @endforeach
              </select>
              @error('teacher_id')  <span style='color:red'>{{$errors->first('teacher_id')}}</span>  @enderror
            </div>
            <div class="form-group col-md-6">
              <label for="inputStartDate">Start Date</label>
              <input type="text" class="form-control" id="inputStartDate" placeholder="StartDate" name="start_date" value="{{$data->start_date?$data->start_date:old('start_date')}}">
              @error('start_date')  <span style='color:red'>{{$errors->first('start_date')}}</span>  @enderror
            </div> 
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        
        </form>
        <form action="{{ url('/admin/batches/'.$data->id) }}" method="post">@csrf
          @method('DELETE')
          <button class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure?')" data-toggle="tooltip" type="submit">Delete</button>
        </form>
        <a href="{{ url()->previous() }}">Back</a>
    

  </div>
</div>
@endsection
