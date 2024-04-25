@extends('layout.main')

@section('content')
@include('include.sidebar')
<div class="container col-md-10 mb-3">
    
    <h1>Gender List</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Gender</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($genders as $gender)
            <tr>
                <td>{{ $gender->gender_id }}</td>
                <td>{{ $gender->gender }}</td>

                <td>
                    <a href="{{ route('genders.show', $gender->gender_id) }}" class="btn btn-primary">View</a>
                    <form action="{{ route('genders.destroy', $gender->gender_id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
