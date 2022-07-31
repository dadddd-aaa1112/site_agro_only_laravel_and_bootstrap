@extends('admin.layouts.main')
@section('content')
    <h3>Удобрения</h3>
    <div class="mb-3 d-flex justify-content-between">
        <a class="btn btn-outline-warning" href="{{route('admin.fertilizer.edit', $fertilizer->id)}}">Редактировать</a>
        @include('admin.fertilizer.delete.destroy')
    </div>
    <table class="table table-info table-hover">

        <tr>
            <th scope="col">#</th>
            <th scope="row">{{$fertilizer->id}}</th>
        </tr>
        <tr>
            <th scope="col">Наименование</th>
            <td>{{$fertilizer->title}}</td>
        </tr>
        <tr>
            <th scope="col">Нормы азота</th>
            <td>{{$fertilizer->norm_azot}}</td>
        </tr>
        <tr>
            <th scope="col">Нормы фосфора</th>
            <td>{{$fertilizer->norm_fosfor}}</td>
        </tr>
        <tr>
            <th scope="col">Нормы калия</th>
            <td>{{$fertilizer->norm_kalii}}</td>
        </tr>
        <tr>
            <th scope="col">Культуры</th>
            <td>{{$fertilizer->culture_id}}</td>
        </tr>
        <tr>
            <th scope="col">Район</th>
            <td>{{$fertilizer->raion}}</td>
        </tr>
        <tr>
            <th scope="col">Цена</th>
            <td>{{$fertilizer->cost}}</td>
        </tr>
        <tr>
            <th scope="col">Описание</th>
            <td>{{$fertilizer->description}}</td>
        </tr>
        <tr>
            <th scope="col">Назначение</th>
            <td>{{$fertilizer->target}}</td>
        </tr>

    </table>
@endsection
