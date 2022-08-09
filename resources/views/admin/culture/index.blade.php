@extends('admin.layouts.main')
@section('content')
    @if(session('status'))
        @if(session('status') == 'finished')
            <div class="alert alert-default-success">
                Успешно загружено
            </div>
         @else
            <div class="alert alert-default-danger">
                {{session('status')}}
            </div>
        @endif
    @endif

    @if($errors->any())
        <div class="alert alert-default-danger">
            <h5 class="text-danger"> Ошибки при загрузке: </h5>
            <ol>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ol>
        </div>
    @endif

    <h3>Культуры</h3>
    @if(request()->has('view_deleted'))
        <div class="mb-3 d-flex justify-content-between">
            <a class="btn btn-outline-warning"
               href="{{route('admin.culture.index')}}">Просмотреть все</a>
            <a class="btn btn-outline-success" href="{{route('admin.culture.restore_all')}}">Восстановить всё</a>
        </div>
    @else
        <div class="mb-3 d-flex justify-content-between">
            <a class="btn btn-outline-info" href="{{route('admin.culture.create')}}">Создать</a>
            <a class="btn btn-outline-warning"
               href="{{route('admin.culture.index', ['view_deleted' => 'DeletedRecords'])}}">Просмотреть удаленные
            </a>
            <form action="{{route('admin.culture.export')}}" method="get">
                <button type="submit" class="btn btn-outline-success">Сохранить данные в Excel</button>
            </form>
        </div>



        <form class="mb-3 w-50" action="{{route('admin.culture.excel')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputFile">Загрузить Excel файл</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="culture_excel">
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



    <table class="table table-info table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Наименование</th>
            <th scope="col">Действия</th>


        </tr>
        </thead>
        <tbody>

        @foreach($cultures as $culture)
            <tr>
                <th scope="row">{{$culture->id}}</th>
                <td>
                    <a href="{{route('admin.culture.show', $culture->id)}}">
                        {{$culture->title}}
                    </a>
                </td>

                @if(request()->has('view_deleted'))

                    <td><a href="{{route('admin.culture.restore', $culture->id)}}">Восстановить</a></td>
                    <td><a href="{{route('admin.culture.force_delete', $culture->id)}}">Удалить навсегда</a></td>
                @else
                    <td><a href="{{route('admin.culture.edit', $culture->id)}}">Редактировать</a></td>
                    <td>@include('admin.culture.delete.destroy')</td>
                @endif
            </tr>
        @endforeach

        </tbody>
    </table>
    @if(request()->has('view_deleted'))
    @else
    {{$cultures->links()}}
    @endif
@endsection
