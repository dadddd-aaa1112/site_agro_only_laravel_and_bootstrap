@extends('layouts.app')
@section('content')
<div class="container w-50">
    <h2>Login</h2>
    <form action="{{route('login')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="password" name="password">
        </div>

        <button type="submit" class="btn btn-outline-success">Login</button>
    </form>
</div>
@endsection
