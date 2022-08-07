@extends('admin.layouts.main')
@section('content')

    <table class="table table-success table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Тип</th>
            <th scope="col">Статус</th>
            <th scope="col">Комментарии к статусу</th>
            <th scope="col">Пользователь ID</th>
            <th scope="col">Пользователь</th>
            <th scope="col">Дата создания импорта</th>
            <th scope="col">Дата окончания импорта</th>
        </tr>
        </thead>
        <tbody>
        @foreach($imports as $import)
            <tr>
                <th scope="row">{{$import->id}}</th>
                <td>{{$import->type}}</td>
                <td>{{$import->status}}</td>
                <td>{{$import->output}}
{{--                    <ol>--}}
{{--                    @foreach($import->output as $message)--}}
{{--                       <li>{{$message->$message}}</li>--}}
{{--                    @endforeach--}}
{{--                    </ol>--}}
                </td>
                <td>{{$import->user_id }}</td>
                <td>{{$import->users->name ?? ''}}</td>
                <td>{{$import->started_at}}</td>
                <td>{{$import->finished_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$imports->links()}}
@endsection
