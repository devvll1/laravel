@extends('layout.main')

@section('content')
@include('include.sidebar')
<div class="container col-md-10 mb-3">
    
    <h1>Add New Gender</h1>

    <form action="{{ route('genders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <input type="text" class="form-control" id="gender" name="gender" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Gender</button>
    </form>
</div>

@endsection
