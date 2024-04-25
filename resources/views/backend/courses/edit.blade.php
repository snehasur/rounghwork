@extends('backend.layout.layout')

@section('space-work')
<div class="card">
  <div class="card-header">
    Course Update
  </div>
  <div class="card-body">
    <form action="{{route('courses.update',$data->id)}}" method="post">
        @csrf
        @method('Patch')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Name</label>
                <input type="text" style="border: 1px solid black;" class="form-control" id="inputName" placeholder="Name" name="name" value="{{$data->name?$data->name:old('name')}}">
                @error('name')  <span style='color:red'>{{$errors->first('name')}}</span>  @enderror
            </div>
           <div class="form-group col-md-6">
              <label for="inputSyllabus">Syllabus</label>
              <textarea class="form-control" id="inputSyllabus" placeholder="Syllabus" name="syllabus" >{{$data->syllabus?$data->syllabus:old('syllabus')}}</textarea>
              @error('syllabus')  <span style='color:red'>{{$errors->first('syllabus')}}</span>  @enderror
            </div>
            
            <div class="form-group col-md-6">
              <label for="inputDuration">Duration</label>
              <input type="tel" class="form-control" id="inputDuration" placeholder="Duration" name="duration" value="{{$data->duration?$data->duration:old('duration')}}"> months
              @error('duration')  <span style='color:red'>{{$errors->first('duration')}}</span>  @enderror
            </div>
             <div class="form-group col-md-6">
              <label for="inputFee">Fee</label>
              <input type="text" class="form-control" id="inputFee" placeholder="Fee" name="fee" value="{{$data->fee?$data->fee:old('fee')}}">
              @error('fee')  <span style='color:red'>{{$errors->first('fee')}}</span>  @enderror
            </div>
      
        
       
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        
        </form>
        <form action="{{ url('/admin/courses/'.$data->id) }}" method="post">@csrf
          @method('DELETE')
          <button class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure?')" data-toggle="tooltip" type="submit">Delete</button>
        </form>
        <a href="{{ url()->previous() }}">Back</a>
    

  </div>
</div>
@endsection
