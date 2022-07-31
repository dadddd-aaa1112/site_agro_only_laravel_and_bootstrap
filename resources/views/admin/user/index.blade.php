@extends('admin.layouts.main')
@section('content')
    <h3>Пользователи</h3>
    <div class="mb-3 d-flex justify-content-between">
        @if(request()->has('view_deleted'))
            <a class="btn btn-outline-info" href="{{route('admin.user.index')}}">Посмотреть все</a>
            <a class="btn btn-outline-info" href="{{route('admin.user.restore_all')}}">Восстановить все</a>
        @else
            <a class="btn btn-outline-info" href="{{route('admin.user.create')}}">Создать</a>
            <a class="btn btn-outline-info" href="{{route('admin.user.index', ['view_deleted' => 'DeletedRecords'])}}">Посмотреть удаленные</a>
        @endif
    </div>
    <table class="table table-info table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Наименование</th>
            <th scope="col">Действия</th>


        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td><a href="{{route('admin.user.show', $user->id)}}">{{$user->name}}</a></td>

                @if(request()->has('view_deleted'))
                    <td><a href="{{route('admin.user.restore', $user->id)}}">Восстановить</a></td>
                    <td><a href="{{route('admin.user.force_delete', $user->id)}}">Удалить навсегда</a></td>
                @else
                    <td><a href="{{route('admin.user.edit', $user->id)}}">Редактировать</a></td>
                    <td>@include('admin.user.delete.destroy')</td>
                @endif
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
