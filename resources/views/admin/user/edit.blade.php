@extends('admin.layouts.main')
@section('content')
    <h3>Редактировать</h3>
    <div class="mb-3">
        <a href="{{route('admin.user.index')}}">На главную</a>
    </div>
    <form class="w-25" action="{{route('admin.user.update', $user->id)}}" method="post">
        @method('patch')
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" value="{{$user->name}}" name="name" class="form-control" placeholder="name">
            @error('name')
            {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">email</label>
            <input type="email" value="{{$user->email}}" name="email" class="form-control" placeholder="email">
            @error('email')
            {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">role</label>
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
