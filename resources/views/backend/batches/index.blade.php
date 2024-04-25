@extends('backend.layout.layout')

@section('space-work')
<body>
    <div class="card">
    <div class="card-header">
      Batch List
    </div>
    <br>
        <a href="{{route('batches.create')}}"><button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button></a>                   
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Course Name</th>
                        <th>Teacher Name</th>
                        <th>Start Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->course->name}}</td>
                        <td>{{$data->teacher->name}}</td>
                        <td>{{$data->start_date}}</td>
                        <td>
                            <a href="{{ route('batches.show', $data->id) }}" class="view" title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('batches.edit', $data->id) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                           <form action="{{ route('batches.destroy', $data->id) }}" method="post">@csrf
                            @method('DELETE')
                            <button class="delete" title="Delete" onclick="return confirm('Are you sure?')" data-toggle="tooltip" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    
    </div>     
</body>
@endsection