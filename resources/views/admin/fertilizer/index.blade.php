@extends('admin.layouts.main')
@section('content')
    <div class="mb-3">
        <a class="btn btn-outline-info" href="{{route('admin.fertilizer.create')}}">Создать</a>
    </div>
    <table class="table table-info table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Наименование</th>
            <th scope="col">norm_azot</th>
            <th scope="col">norm_fosfor</th>
            <th scope="col">norm_kalii</th>
            <th scope="col">culture_id</th>
            <th scope="col">raion</th>
            <th scope="col">cost</th>
            <th scope="col">description</th>
            <th scope="col">target</th>
            <th scope="col">Редактировать</th>
            <th scope="col">Удалить</th>

        </tr>
        </thead>
        <tbody>

        @foreach($fertilizers as $fertilizer)
            <tr>
                <th scope="row">{{$fertilizer->id}}</th>
                <td>{{$fertilizer->norm_azot}}</td>
                <td>{{$fertilizer->norm_fosfor}}</td>
                <td>{{$fertilizer->norm_kalii}}</td>
                <td>{{$fertilizer->culture_id}}</td>
                <td>{{$fertilizer->raion}}</td>
                <td>{{$fertilizer->cost}}</td>
                <td>{{$fertilizer->description}}</td>
                <td>{{$fertilizer->target}}</td>

                <td><a href="{{route('admin.fertilizer.edit', $fertilizer->id)}}">Редактировать</a></td>
                <td>@include('admin.fertilizer.delete.destroy')</td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
