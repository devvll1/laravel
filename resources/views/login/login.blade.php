@extends('layout.main')

@section('content')

    <div class="card col-sm-5 mt-3 mx-auto">
        <div class="card-body">
            <h5 class="card-title">
                User Authentication
            </h5>
            <form action="/process/login" method="post">
                @csrf
                <div class="mb-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" />
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" />
                </div>
                    <button type="submit" class="btn btn-primary col-sm-3 float-end">Login</button>
                </form>
            </div>
        </div>
@endsection   
