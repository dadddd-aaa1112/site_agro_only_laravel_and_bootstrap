@extends('layouts.app')

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center bg-info bg-gradient">
        <form style="width: 25rem;" class="rounded p-5  bg-light " action="{{route('register')}}" method="POST">
            @csrf
            <h2 class="text-center">Регистрация</h2>
            <div class="mb-3">
                <label class="mb-n1">Имя</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="имя">
            @error('name')
            <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="mb-n1">Email</label>
                <input type="email" value="{{old('email')}}" class="form-control" name="email" placeholder="email">
                @error('email')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="mb-n1">Пароль</label>
                <input type="password" value="{{old('password')}}" class="form-control" placeholder="пароль" name="password">
                @error('password')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label class="mb-n1">Подтверждение пароля</label>
                <input type="password" value="{{old('password_confirmation')}}" class="form-control" placeholder="подтвердите пароль"
                       name="password_confirmation">
                @error('password_confirmation')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
{{--            <div class="mb-3">--}}
{{--                <label class="mb-n1">Выберите роль</label>--}}
{{--                <select class="form-select" name="role">--}}
{{--                    <option value="1" {{old('role') == 1 ? 'selected' : ''}}>Администратор</option>--}}
{{--                    <option value="2" {{old('role') == 2 ? 'selected' : ''}}>Пользователь</option>--}}
{{--                </select>--}}
{{--                @error('role')--}}
{{--                <span class="text-danger">{{$message}}</span>--}}
{{--                @enderror--}}
{{--            </div>--}}
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-info ">Зарегистрироваться</button>
            </div>
        </form>
    </div>
@endsection
