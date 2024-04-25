@extends('backend.layout.layout')

@section('space-work')
<div class="card">
  <div class="card-header">
    Enrollment Update
  </div>
  <div class="card-body">
    <form action="{{route('enrollments.update',$data->id)}}" method="post">
        @csrf
        @method('Patch')

         <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEnrollNo">Enroll No</label>
                <input type="text" disabled style="border: 1px solid black;" class="form-control" id="inputEnrollNo" placeholder="Name" name="enroll_no" value="{{$data->enroll_no?$data->enroll_no:old('enroll_no')}}">
                @error('enroll_no')  <span style='color:red'>{{$errors->first('enroll_no')}}</span>  @enderror
            </div>
           <div class="form-group col-md-6">
              <label for="inputBatchName">Batch Name</label>
              <select name="batch_id" id="inputBatchName" class="form-control">
              @foreach($batches as $batch)         
                <option value="{{ $batch->id }}" @if($batch->id == $data->batch_id) selected @endif>
                    {{ $batch->name }}
                </option>
              @endforeach 
              </select>
              
              @error('batch_id')  <span style='color:red'>{{$errors->first('batch_id')}}</span>  @enderror
            </div>
            
            <div class="form-group col-md-6">
              <label for="inputStudentName">Student Name</label>              
              <select name="student_id" id="inputStudentName" class="form-control">
              @foreach($students as $student)         
                <option value="{{ $student->id }}" @if($student->id == $data->student_id) selected @endif>
                    {{ $student->name }}
                </option>
              @endforeach
              </select>
              @error('student_id')  <span style='color:red'>{{$errors->first('student_id')}}</span>  @enderror
            </div>
           
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        
        </form>
        <form action="{{ url('/admin/enrollments/'.$data->id) }}" method="post">@csrf
          @method('DELETE')
          <button class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure?')" data-toggle="tooltip" type="submit">Delete</button>
        </form>
        <a href="{{ url()->previous() }}">Back</a>
    

  </div>
</div>
@endsection
