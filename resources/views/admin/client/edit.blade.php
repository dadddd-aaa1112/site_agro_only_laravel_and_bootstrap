@extends('admin.layouts.main')
@section('content')
    <h3>Клиенты</h3>
    <h3>Редактировать</h3>
    <div class="mb-3">
        <a href="{{route('admin.client.index')}}">На главную</a>
    </div>
    <form class="w-25" action="{{route('admin.client.update', $client->id)}}" method="post">
        @method('patch')
        @csrf
        <div class="mb-3">
            <label class="form-label">Наименование</label>
            <input value="{{$client->title}}" type="text" name="title" class="form-control"  placeholder="наименование">
        </div>
        <div class="mb-3">
            <label  class="form-label">Дата контракта</label>
            <input value="{{$client->contract_date}}" name="contract_date" type="date" class="form-control" placeholder="дата контракта">
        </div>
        <div class="mb-3">
            <label class="form-label">Цена заказа</label>
            <input value="{{$client->cost_deliveries}}" name="cost_deliveries" type='number' step='any' class="form-control" placeholder="цена заказа" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Регион</label>
            <input value="{{$client->region}}" name="region" type="text" class="form-control" placeholder="регион">
        </div>
        <button type="submit" class="btn btn-outline-warning">Редактировать</button>
    </form>
@endsection
