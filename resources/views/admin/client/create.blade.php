@extends('admin.layouts.main')
@section('content')
    <h3>Клиенты</h3>
    <div class="mb-3">
        <a class="btn btn-outline-info" href="{{route('admin.client.index')}}">На главную</a>
    </div>
    <form class="w-25" action="{{route('admin.client.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Наименование</label>
            <input type="text" value="{{old('title')}}" name="title" class="form-control" placeholder="наименование">

            @error('title')

            {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Дата контракта</label>
            <input value="{{old('contract_date')}}" name="contract_date" type="date" class="form-control"
                   placeholder="дата контракта">

            @error('contract_date')
            {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Цена заказа</label>
            <input value="{{old('cost_deliveries')}}" name="cost_deliveries" type='number' step='any'
                   class="form-control" placeholder="цена заказа">

            @error('cost_deliveries')
            {{$message}}
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Регион</label>
            <input value="{{old('region')}}" name="region" type="text" class="form-control" placeholder="регион">

            @error('region')
            {{$message}}
            @enderror
        </div>
        <button type="submit" class="btn btn-outline-warning">Создать</button>
    </form>
@endsection
