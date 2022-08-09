@extends('admin.layouts.main')
@section('content')
    @if(session('status'))
        @if(session('status') == 'finished')
            <div class="alert alert-default-success">
                Данные загружены успешно
            </div>
        @else
            <div class="alert alert-default-danger">
                Данные не загружены
            </div>
        @endif
    @endif

    @if($errors->any())
        <div class="alert alert-default-danger">
            <h5 class="text-danger">Ошибки при загрузке: </h5>
            <ol>
                @foreach($errors->all() as $error)
                    <ul>{{$error}}</ul>
                @endforeach
            </ol>
        </div>
    @endif

    <h3>Пользователи</h3>
    <div class="mb-3 d-flex justify-content-between">
        @if(request()->has('view_deleted'))
            <a class="btn btn-outline-info" href="{{route('admin.user.index')}}">Посмотреть все</a>
            <a class="btn btn-outline-info" href="{{route('admin.user.restore_all')}}">Восстановить все</a>
        @else
            <div class="d-flex flex-column">
                <a class="btn btn-outline-info mb-3" href="{{route('admin.user.create')}}">Создать</a>
                <a class="btn btn-outline-info"
                   href="{{route('admin.user.index', ['view_deleted' => 'DeletedRecords'])}}">Посмотреть удаленные</a>
            </div>

        <form action="{{route('admin.user.export')}}" method="get">
            <button type="submit" class="btn btn-outline-success">Сохранить данные в Excel</button>
        </form>

            <form class="mb-3" action="{{route('admin.user.excel')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputFile">Загрузить Excel файл</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="user_excel">
                            <label class="custom-file-label"></label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Выбрать файл</span>
                        </div>
                    </div>
                </div>
                <button class="btn btn-outline-secondary" type="submit">Импортировать</button>
            </form>

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
    @if(request()->has('view_deleted'))
    @else
    {{ $users->links()}}
    @endif
@endsection
