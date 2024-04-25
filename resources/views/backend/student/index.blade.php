@extends('backend.layout.layout')

@section('space-work')
<body>
    <div class="card">
    <div class="card-header">
      Student List
    </div>
    <br>
        <a href="{{route('admin.students.create')}}"><button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i> Add New</button></a>                   
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->phone}}</td>
                        <td>{{$student->address}}</td>
                        <td>
                            <a href="{{ route('admin.students.show', $student->id) }}" class="view" title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('admin.students.edit', $student->id) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
                           <form action="{{ route('admin.students.destroy', $student->id) }}" method="post">@csrf
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