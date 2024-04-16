@extends('layout.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('include.sidebar')
        <!-- User Form -->
        <div class="col-md-9">
            <div class="container">
                <h1>Add User</h1>
                <form action="{{ route('users.store') }}" method="post" class="needs-validation">
                    @csrf
                    <div class="row g-3">
                        <!-- Personal Information -->
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name">
                            @error('first_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" >
                        </div>
                        <div class="col-md-6">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name">
                        </div>
                        <div class="col-md-6">
                            <label for="suffix_name" class="form-label">Suffix Name</label>
                            <input type="text" class="form-control" id="suffix_name" name="suffix_name">
                        </div>
                        <div class="col-md-6">
                            <label for="birth_date" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date" >
                        </div>
                        <div class="col-md-6">
                            <label for="gender_id" class="form-label">Gender</label>
                            <select class="form-select" id="gender_id" name="gender_id" >
                                <option value="">Select Gender</option>
                                @foreach($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Contact Information -->
                        <div class="col-md-12">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="2" ></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contact_number" name="contact_number" >
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" >
                        </div>
                        
                        <!-- Account Information -->
                        <div class="col-md-6">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" >
                        </div>
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" >
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" >
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Add User</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
