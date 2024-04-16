@extends('layout.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @include('include.sidebar')
        
        <!-- User Cards -->
        <div class="col-md-9 mb-3">
            <div class="row">
                <div class="d-flex justify-content-center mt-4">
                    {{ $users->links() }}
                </div>
                <form action="{{ route('users.index') }}" method="GET" class="search-form">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
                @foreach($users as $user)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $user->first_name }} {{ $user->last_name }}</h5>
                                <p class="card-text flex-fill">
                                    <strong>ID:</strong> {{ $user->user_id }} <br>
                                    <strong>Middle Name:</strong> {{ $user->middle_name }} <br>
                                    <strong>Suffix Name:</strong> {{ $user->suffix_name }} <br>
                                    <strong>Birth Date:</strong> {{ date('M d, Y', strtotime($user->birth_date)) }} <br>
                                    <strong>Gender:</strong> {{ $user->gender->gender }} <br>
                                    <strong>Address:</strong> {{ $user->address }} <br>
                                    <strong>Contact Number:</strong> {{ $user->contact_number }} <br>
                                    <strong>Email Address:</strong> {{ $user->email }} <br>
                                    <strong>Username:</strong> {{ $user->username }}
                                </p>
                                <div class="btn-group mt-auto" role="group" aria-label="User Actions">
                                    <a href="{{ route('users.show', $user->user_id) }}" class="btn btn-primary">View</a>
                                    <a href="{{ route('users.edit', $user->user_id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('users.destroy', $user->user_id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
