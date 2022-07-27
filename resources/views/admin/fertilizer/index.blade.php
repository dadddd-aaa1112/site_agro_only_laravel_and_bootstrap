@extends('admin.layouts.main')
@section('content')
    <div class="mb-3 d-flex justify-content-between w-50">
        @if(request()->has('view_deleted'))
            <a class="btn btn-outline-info" href="{{route('admin.fertilizer.index')}}">Посмотреть все</a>
            <a class="btn btn-outline-info" href="{{route('admin.fertilizer.restore_all')}}">Восстановить все</a>
        @else
            <a class="btn btn-outline-info" href="{{route('admin.fertilizer.create')}}">Создать</a>
            <a class="btn btn-outline-info"
               href="{{route('admin.fertilizer.index', ['view_deleted' => 'DeletedRecords'])}}">Посмотреть
                удаленные</a>
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

        @foreach($fertilizers as $fertilizer)
            <tr>
                <th scope="row">{{$fertilizer->id}}</th>
                <td>{{$fertilizer->title}}</td>
                @if(request()->has('view_deleted'))
                    <td><a href="{{route('admin.fertilizer.restore', $fertilizer->id)}}">Восстановить</a></td>
                    <td><a href="{{route('admin.fertilizer.force_delete', $fertilizer->id)}}">Удалить навсегда</a></td>
                @else
                    <td><a href="{{route('admin.fertilizer.edit', $fertilizer->id)}}">Редактировать</a></td>
                    <td>@include('admin.fertilizer.delete.destroy')</td>

                @endif
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
