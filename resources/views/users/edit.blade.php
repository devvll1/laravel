@extends('layout.main')

@section('content')
<div class="container-fluid">

    <div class="row justify-content-center">
        @include('include.sidebar')
        <div class="col-md-10 mt-3">
            <form method="POST" action="{{ route('users.update', ['id' => $user->user_id]) }}">
                @csrf
                @method('PUT')

                <h1>Edit Information</h1>
                <hr>
                <div class="row g-3">
                    <!-- Personal Information -->
                    
                    <div class="col-md-6">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" />
                        @error('photo') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}" />
                        @error('first_name') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}" />
                        @error('last_name') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ old('middle_name', $user->middle_name) }}" />
                        @error('middle_name') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="suffix_name" class="form-label">Suffix Name</label>
                        <input type="text" class="form-control" id="suffix_name" name="suffix_name" value="{{ old('suffix_name', $user->suffix_name) }}" />
                        @error('suffix_name') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="birth_date" class="form-label">Birth Date</label>
                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ old('birth_date', $user->birth_date) }}" />
                        @error('birth_date') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="gender_id" class="form-label">Gender</label>
                        <select class="form-select" id="gender_id" name="gender_id">
                            <option value="" selected>Select Gender</option>
                            @foreach($genders as $gender)
                                <option value="{{ $gender->gender_id }}" {{ old('gender_id', $user->gender_id) == $gender->gender_id ? 'selected' : '' }}>{{ $gender->gender }}</option>
                            @endforeach
                        </select>
                        @error('gender_id') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    
                    <!-- Contact Information -->
                    <div class="col-md-12">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" name="address" rows="2">{{ old('address', $user->address) }}</textarea>
                        @error('address') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="contact_number" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ old('contact_number', $user->contact_number) }}" />
                        @error('contact_number') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" />
                        @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                    
                    <!-- Account Information -->
                    <div class="col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}" />
                        @error('username') <p class="text-danger">{{ $message }}</p> @enderror
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Update User</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Return</a>

                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection
