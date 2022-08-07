@extends('admin.layouts.main')
@section('content')
    <h3>Импорты данных</h3>

    <table class="table table-success table-hover">
        <thead>
        <tr class="table-secondary">
            <th scope="col">#</th>
            <th scope="col">Импорт данных</th>
            <th scope="col">Статус</th>
            <th scope="col" class="w-25">Комментарии к статусу</th>
            <th scope="col">Пользователь ID</th>
            <th scope="col">Пользователь</th>
            <th scope="col">Дата создания статуса</th>

        </tr>
        </thead>
        <tbody>
        @foreach($imports as $import)
            @if($import->status == 'успешно загружено')
                <tr class="table-success">
            @else
                <tr class="table-danger">
                    @endif
                    <th scope="row">{{$import->id}}</th>
                    <td>{{$import->type}}</td>
                    <td>{{$import->status}}</td>
                    <td>{{$import->commentarii}}</td>
                    <td>{{$import->user_id }}</td>
                    <td>{{$import->users->name ?? ''}}</td>
                    <td>{{ substr($import->created_at, 0, 11)}}</td>

                </tr>
                @endforeach
        </tbody>
    </table>
    {{$imports->links()}}
@endsection
