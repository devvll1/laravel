@extends('layout.main')

@section('content')

<div class="container">
    <h1>Gender List</h1>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Gender</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $genders->gender_id }}</td>
                <td>{{ $genders->gender }}</td>

                <td>
                    <a href="{{ route('gender.show', $genders->gender_id) }}" class="btn btn-primary">View</a>
                    <form action="{{ route('gender.destroy', $user->user_id) }}" method="POST" style="display: inline-block;">
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
