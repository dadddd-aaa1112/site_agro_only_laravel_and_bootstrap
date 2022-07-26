@extends('layouts.app')
@section('content')
    <div class="container w-50">
        <h2>Register</h2>
        <form method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" placeholder="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="password" name="password">
            </div>
            <div class="mb-3">
                <label class="form-label">Password confirmed</label>
                <input type="password" class="form-control" placeholder="password confirmed"
                       name="password_confirmation">
            </div>
            <div class="mb-3">
                <select class="form-select" name="role">
                    @foreach($roles as $id => $role)
                        <option value="{{$id}}">{{$role}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-outline-success">Register</button>
        </form>
    </div>

@endsection
