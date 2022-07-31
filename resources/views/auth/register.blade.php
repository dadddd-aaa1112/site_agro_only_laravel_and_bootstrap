@extends('layouts.app')

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center bg-info bg-gradient">
        <form style="width: 25rem;" class="rounded p-5  bg-light " action="{{route('register')}}" method="POST">
            @csrf
            <h2 class="text-center">Регистрация</h2>
            <div class="mb-3">
                <label class="mb-n1">Имя</label>
                <input type="text" class="form-control" name="name" placeholder="имя">
            </div>
            <div class="mb-3">
                <label class="mb-n1">Email</label>
                <input type="email" class="form-control" name="email" placeholder="email">
            </div>
            <div class="mb-3">
                <label class="mb-n1">Пароль</label>
                <input type="password" class="form-control" placeholder="пароль" name="password">
            </div>
            <div class="mb-3">
                <label class="mb-n1">Подтверждение пароля</label>
                <input type="password" class="form-control" placeholder="подтвердите пароль"
                       name="password_confirmation">
            </div>
            <div class="mb-3">
                <label class="mb-n1">Выберите роль</label>
                <select class="form-select" name="role">
                    <option value="1">Администратор</option>
                    <option value="2">Пользователь</option>
                </select>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-info ">Зарегистрироваться</button>
            </div>
        </form>
    </div>
@endsection
