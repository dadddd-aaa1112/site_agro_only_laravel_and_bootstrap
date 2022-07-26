@extends('admin.layouts.main')
@section('content')
    <div class="mb-3 d-flex justify-content-between">
        <a class="btn btn-outline-warning" href="{{route('admin.culture.edit', $culture->id)}}">Edit</a>
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
