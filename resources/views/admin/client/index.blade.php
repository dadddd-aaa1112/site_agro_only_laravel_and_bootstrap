@extends('admin.layouts.main')
@section('content')

    <div class="mb-3 d-flex justify-content-between w-50">
        @if(request()->has('view_deleted'))
            <a class="btn btn-outline-secondary" href="{{route('admin.client.index')}}">Посмотреть все</a>
            <a class="btn btn-outline-secondary" href="{{route('admin.client.restore_all')}}">Восстановить все</a>
        @else
            <a class="btn btn-outline-secondary" href="{{route('admin.client.create')}}">Создать</a>
            <a class="btn btn-outline-secondary" href="{{route('admin.client.index', ['view_deleted' => 'DeletedRecords'])}}">Посмотреть удаленные</a>
        @endif

    </div>
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Наименование</th>
            <th scope="col">Дата контракта</th>
            <th scope="col">Цена поставки</th>
            <th scope="col">Регион</th>
            <th scope="col">Действия</th>

        </tr>
        </thead>
        <tbody>

        @foreach($clients as $client)
            <tr>
                <th scope="row">{{$client->id}}</th>
                <td><a href="{{route('admin.client.show', $client->id)}}">{{$client->title}}</a></td>
                <td>{{$client->contract_date}}</td>
                <td>{{$client->cost_deliveries}}</td>
                <td>{{$client->region}}</td>
                @if(request()->has('view_deleted'))
                    <td><a href="{{route('admin.client.restore', $client->id)}}">Восстановить</a></td>
                    <td><a href="{{route('admin.client.force_delete', $client->id)}}">Удалить навсегда</a></td>
                @else
                    <td><a href="{{route('admin.client.edit', $client->id)}}">Edit</a></td>
                    <td>@include('admin.client.delete.destroy')</td>
                @endif
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
