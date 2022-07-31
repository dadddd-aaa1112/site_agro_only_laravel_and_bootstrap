@extends('layouts.app')

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center bg-success bg-gradient">


        <form style="width: 25rem;" class="bg-light rounded p-5" action="{{route('login')}}" method="POST">
            @csrf
            <h2 class="text-center">Авторизация</h2>
            <div class="mb-3">
                <label class="mb-n1">Email</label>
                <input type="email" value="{{old('email')}}" class="form-control" name="email" placeholder="email">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class=" mb-n1">Пароль</label>
                <input type="password" value="{{old('password')}}" class="form-control" placeholder="пароль"
                       name="password">
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-success">Войти</button>
            </div>
        </form>
    </div>
@endsection
