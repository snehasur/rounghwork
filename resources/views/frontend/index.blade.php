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
        Coming Soon....    
    </div>     
</body>
@endsection