@extends('layout.main')

@section('content')
@include('include.sidebar')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>User Details</h2>
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">First Name</th>
                        <td>{{ $user->first_name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Middle Name</th>
                        <td>{{ $user->middle_name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Last Name</th>
                        <td>{{ $user->last_name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Age</th>
                        <td>{{ $user->age }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
