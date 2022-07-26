@extends('admin.layouts.main')
@section('content')
    <div class="mb-3">
        <a class="btn btn-outline-secondary" href="{{route('admin.client.create')}}">Создать</a>
    </div>
    <table class="table table-dark table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Наименование</th>
            <th scope="col">Дата контракта</th>
            <th scope="col">Цена поставки</th>
            <th scope="col">Регион</th>
            <th scope="col">Редактировать</th>
            <th scope="col">Удалить</th>
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
                <td><a href="{{route('admin.client.edit', $client->id)}}">Edit</a></td>
                <td>@include('admin.client.delete.destroy')</td>
            </tr>
        @endforeach

        </tbody>
    </table>

@endsection
