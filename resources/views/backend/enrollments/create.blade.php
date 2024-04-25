@extends('backend.layout.layout')

@section('space-work')
<div class="card">
  <div class="card-header">
    Enrollment Add
  </div>
  <div class="card-body">
    <form action="{{route('enrollments.store')}}" method="post">
        @csrf
        <div class="form-row">
            <!-- <div class="form-group col-md-6">
                <label for="inputEnrollNo">Enroll No</label>
                <input type="text" style="border: 1px solid black;" class="form-control" id="inputEnrollNo" placeholder="Enroll No" name="enroll_no" value="{{old('enroll_no')}}">
                @error('enroll_no')  <span style='color:red'>{{$errors->first('enroll_no')}}</span>  @enderror
            </div> -->
           <div class="form-group col-md-6">
              <label for="inputBatchName">Batch Name</label>             

              <select name="batch_id" id="inputBatchName" class="form-control">
              @foreach($batches as $batche)
                <option value="{{$batche->id?$batche->id:old('batch_id')}}">{{$batche->id?$batche->name:old('batch_id')}}</option>
              @endforeach
              </select>

              @error('batch_id')  <span style='color:red'>{{$errors->first('batch_id')}}</span>  @enderror
            </div>
            
            <div class="form-group col-md-6">
              <label for="inputStudentName">Student Name</label>             

              <select name="student_id" id="inputStudentName" class="form-control">
              @foreach($students as $student)
                <option value="{{$student->id?$student->id:old('student_id')}}">{{$student->id?$student->name:old('student_id')}}</option>
              @endforeach
              </select>

              @error('student_id')  <span style='color:red'>{{$errors->first('student_id')}}</span>  @enderror
            </div>
          
       
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ url()->previous() }}">Back</a>
      </form>
    

  </div>
</div>
@endsection
