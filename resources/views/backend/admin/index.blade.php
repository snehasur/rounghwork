@extends('backend.layout.layout')

@section('space-work')


<body>
    <div class="card">
        <div class="card-header">
        Admin profile-({{$data->name}})
        <a href="{{ route('dashboard.show', $data->id) }}" class="view" title="View" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
            <a href="{{ route('dashboard.edit', $data->id) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-edit"></i></a>
        </div>
        <br>
        
        <div class="card-body">
            

        </div>
    </div>     
</body>
@endsection