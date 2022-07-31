@extends('admin.layouts.main')
@section('content')
    <h3>Клиенты</h3>
    <div class="d-flex w-25 justify-content-around mb-3">
        <a class="btn btn-outline-warning" href="{{route('admin.client.edit', $client->id)}}">Редактировать</a>

     @include('admin.client.delete.destroy')

    </div>
    <h2 class="mb-3">{{$client->title}}</h2>
    <table class="table table-dark table-hover">

        <tr>
            <th scope="col">#</th>
            <th scope="row">{{$client->id}}</th>
        </tr>
        <tr>
            <th scope="col">Наименование</th>
            <td>{{$client->title}}</td>
        </tr>
        <tr>
            <th scope="col">Дата контракта</th>
            <td>{{$client->contract_date}}</td>

        </tr>
        <tr>
            <th scope="col">Цена поставки</th>
            <td>{{$client->cost_deliveries}}</td>
        </tr>
        <tr>
            <th scope="col">Регион</th>
            <td>{{$client->region}}</td>
        </tr>

    </table>

@endsection
