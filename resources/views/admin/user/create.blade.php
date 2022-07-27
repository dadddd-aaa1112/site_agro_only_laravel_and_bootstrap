@extends('admin.layouts.main')
@section('content')
    <div class="mb-3">
        <a class="btn btn-outline-secondary" href="{{route('admin.user.index')}}">На главную</a>
    </div>
    <form action="{{route('admin.user.store')}}" method="post">
        @csrf
        @method('post')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" value="{{old('name')}}" name="name" class="form-control" placeholder="name">
            @error('name')
            {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">email</label>
            <input type="email" value="{{old('email')}}" name="email" class="form-control" placeholder="email">
            @error('email')
            {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">password</label>
            <input type="password" value="{{old('password')}}" name="password" class="form-control"
                   placeholder="password">
            @error('password')
            {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">password_confirmation</label>
            <input type="password" value="{{old('password_confirmation')}}" name="password_confirmation"
                   class="form-control" placeholder="password_confirmation">
            @error('password_confirmation')
            {{$message}}
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">role</label>
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

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
