@extends('frontend.layout.layout')

@section('space-work')

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
    @endif
<body>
    <div class="card">
    <div class="card-header">
      Student Profile
    </div>
    <br>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Phone No</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->password}}</td>
                        <td>{{$student->phone}}</td>
                        <td>{{$student->address}}</td>
                        <td>
                            <a href="{{ route('students.show', $student->id) }}" class="view" title="View" data-toggle="tooltip"><i class="fa fa-eye">View</i></a>
                            <a href="{{ route('students.edit', $student->id) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-edit">Edit</i></a>
                           {{-- <form action="{{ route('students.destroy', $student->id) }}" method="post">@csrf
                            @method('DELETE')
                            <button class="delete" title="Delete" onclick="return confirm('Are you sure?')" data-toggle="tooltip" type="submit"><i class="fa fa-trash">DELETE</i></button>
                            </form> --}}
                        </td>
                    </tr>
                </tbody>
            </table>
    
    </div>     
</body>
@endsection