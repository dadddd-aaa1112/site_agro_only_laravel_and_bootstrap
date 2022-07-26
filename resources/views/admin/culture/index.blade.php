@extends('admin.layouts.main')
@section('content')
    <div class="mb-3">
        <a class="btn btn-outline-info" href="{{route('admin.culture.create')}}">Создать</a>
    </div>
<table class="table table-info table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Наименование</th>
        <th scope="col">Редактировать</th>
        <th scope="col">Удалить</th>

    </tr>
    </thead>
    <tbody>

        @foreach($cultures as $culture)
            <tr>
        <th scope="row">{{$culture->id}}</th>
        <td>{{$culture->title}}</td>
        <td><a href="{{route('admin.culture.edit', $culture->id)}}">Редактировать</a></td>
        <td>@include('admin.culture.delete.destroy')</td>
            </tr>
       @endforeach

    </tbody>
</table>
@endsection
