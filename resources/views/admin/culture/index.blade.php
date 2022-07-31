@extends('admin.layouts.main')
@section('content')
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
        </div>
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
@endsection
