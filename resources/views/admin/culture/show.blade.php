@extends('admin.layouts.main')
@section('content')
    <h3>Культуры</h3>
    <div class="mb-3 d-flex justify-content-between">
        <a class="btn btn-outline-warning" href="{{route('admin.culture.edit', $culture->id)}}">Редактировать</a>
        @include('admin.culture.delete.destroy')
    </div>
    <table class="table table-info table-hover">

        <tr>
            <th scope="col">#</th>
            <th scope="row">{{$culture->id}}</th>
        </tr>
        <tr>
            <th scope="col">Наименование</th>
            <td>{{$culture->title}}</td>

        </tr>

    </table>
@endsection
