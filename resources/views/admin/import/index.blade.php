@extends('admin.layouts.main')
@section('content')
    <h3>Импорты данных</h3>



        <table class="table table-success table-hover">
            <thead>
            <tr class="table-secondary">
                <th scope="col">#</th>
                <th scope="col">Импорт данных</th>
                <th scope="col">Статус</th>
                <th scope="col">Ошибочные ряды <br>
                    в Excel файле
                </th>
                <th scope="col">Загружал<br>
                    пользователь ID
                </th>
                <th scope="col">Загружал<br>
                    пользователь
                </th>
                <th scope="col">Дата создания статуса</th>

            </tr>
            </thead>
            <tbody>
            @foreach($imports as $import)
                @if($import->status == 1)
                    <tr class="table-success">
                @else
                    <tr class="table-danger">
                        @endif
                        <th scope="row">{{$import->id}}</th>

                        <td>
                            @foreach($types as $numberType => $type)
                                @if($import->type == $numberType)
                                    {{$type}}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach($statuses as $numberStatus => $status)
                                @if($numberStatus == $import->status)
                                    {{$status}}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @if(isset($import->commentarii))
                                <ul>
                                    @foreach($import->commentarii['row'] as $comment)
                                        <li> {{$comment}}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                        <td>{{$import->user_id }}</td>
                        <td>{{$import->users->name ?? ''}}</td>
                        <td>{{ substr($import->created_at, 0, 11)}}</td>

                    </tr>
                    @endforeach
            </tbody>
        </table>
        {{$imports->links()}}

@endsection
