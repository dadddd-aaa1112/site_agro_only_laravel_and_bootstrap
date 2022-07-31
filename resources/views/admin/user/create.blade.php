@extends('admin.layouts.main')
@section('content')
    <h3>Пользователи</h3>
    <div class="mb-3">
        <a class="btn btn-outline-secondary" href="{{route('admin.user.index')}}">На главную</a>
    </div>
    <form action="{{route('admin.user.store')}}" method="post">
        @csrf
        @method('post')
        <div class="mb-3">
            <label class="form-label">Имя</label>
            <input type="text" value="{{old('name')}}" name="name" class="form-control" placeholder="Имя">
            @error('name')
            {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" value="{{old('email')}}" name="email" class="form-control" placeholder="Email">
            @error('email')
            {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Пароль</label>
            <input type="password" value="{{old('password')}}" name="password" class="form-control"
                   placeholder="Пароль">
            @error('password')
            {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Подтверждение пароля</label>
            <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation"
                   class="form-control" placeholder="Подтверждение пароля">
            @error('password_confirmation')
            {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Роль</label>
            <select name="role" class="select-control">
                @foreach($roles as $id => $role)
                    <option value="{{$id}}"
                        {{$id == old('role') ? 'selected' : ''}}
                    >{{$role}}</option>
                @endforeach
            </select>

            @error('role')
            {{$message}}
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
@endsection
