@extends('admin.layouts.main')
@section('content')
    <div class="mb-3 d-flex justify-content-between">
        <a class="btn btn-outline-warning" href="{{route('admin.fertilizer.edit', $fertilizer->id)}}">Edit</a>
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
            <th scope="col">norm_azot</th>
            <td>{{$fertilizer->norm_azot}}</td>
        </tr>
        <tr>
            <th scope="col">norm_fosfor</th>
            <td>{{$fertilizer->norm_fosfor}}</td>
        </tr>
        <tr>
            <th scope="col">norm_kalii</th>
            <td>{{$fertilizer->norm_kalii}}</td>
        </tr>
        <tr>
            <th scope="col">culture_id</th>
            <td>{{$fertilizer->culture_id}}</td>
        </tr>
        <tr>
            <th scope="col">raion</th>
            <td>{{$fertilizer->raion}}</td>
        </tr>
        <tr>
            <th scope="col">cost</th>
            <td>{{$fertilizer->cost}}</td>
        </tr>
        <tr>
            <th scope="col">description</th>
            <td>{{$fertilizer->description}}</td>
        </tr>
        <tr>
            <th scope="col">target</th>
            <td>{{$fertilizer->target}}</td>
        </tr>

    </table>
@endsection
