@extends('layout.main')

@section('content')
@include('include.sidebar')
<div class="container">
    <form method="POST" action="{{ route('users.destroy', ['user' => $user->id]) }}">
        @csrf
        @method('DELETE')
        <p>Are you sure you want to delete this user?</p>
        <button type="submit" class="btn btn-danger">Delete User</button>
    </form>
</div>

@endsection
