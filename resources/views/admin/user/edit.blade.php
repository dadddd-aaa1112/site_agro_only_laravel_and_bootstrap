@extends('admin.layouts.main')
@section('content')

    <h3>Пользователи</h3>
    <h3>Редактировать</h3>
    <div class="mb-3">
        <a href="{{route('admin.user.index')}}">На главную</a>
    </div>
    <form class="w-25" action="{{route('admin.user.update', $user->id)}}" method="post">
        @method('patch')
        @csrf

        <div class="mb-3">
            <label class="form-label">Имя</label>
            <input type="text" value="{{$user->name}}" name="name" class="form-control" placeholder="Имя">
            @error('name')
            {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" value="{{$user->email}}" name="email" class="form-control" placeholder="Email">
            @error('email')
            {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Роль</label>
            <select name="role" class="select-control">
                @foreach($roles as $id => $role)
                    <option value="{{$id}}"
                        {{$id == $user->role ? 'selected' : ''}}
                    >{{$role}}</option>
                @endforeach
            </select>

            @error('role')
            {{$message}}
            @enderror
        </div>
        <button type="submit" class="btn btn-outline-warning">Редактировать</button>
    </form>
@endsection
