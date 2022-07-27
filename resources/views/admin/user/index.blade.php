@extends('admin.layouts.main')
@section('content')
    <div class="mb-3">
        <a class="btn btn-outline-info" href="{{route('admin.user.create')}}">Создать</a>
    </div>
    <table class="table table-info table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Наименование</th>
            <th scope="col">Редактировать</th>
            <th scope="col">Удалить</th>

        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td><a href="{{route('admin.user.edit', $user->id)}}">Редактировать</a></td>
                <td>@include('admin.user.delete.destroy')</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
