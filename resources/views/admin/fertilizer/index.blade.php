@extends('admin.layouts.main')
@section('content')
    <form class="" action="{{route('admin.fertilizer.index')}}" method="get">
        <div class="mb-3 d-flex justify-content-between w-75">
            <input class="w-25" name="search_field" @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}"
                   @endif type="text" class="form-control" placeholder="Type something">
            {{$normAzotMin}} - {{$normAzotMax}}
            <input type="range" value="24" min="{{$normAzotMin}}" max="{{$normAzotMax}}" name="norm_azot">
        </div>

        <div class="mb-3 d-flex justify-content-between w-75">
            <select class="form-select" name="culture_search">
                <option></option>
                @foreach($cultures as $culture)
                    <option
                        value="{{$culture->id}}"
                    @if(isset($_GET['culture_search']))
                        {{ $_GET['culture_search'] == $culture->id ? 'selected' : ''}}
                        @endif
                    >{{$culture->id}}</option>
                @endforeach
            </select>

            <select class="form-select" name="raion_search">
                <option></option>
                @foreach($raions as $raion)
                    <option
                        @if(isset($_GET['raion_search']))
                            value="{{$raion->raion}}"
                        @endif

                    >{{$raion->raion}}</option>

                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
    <div class="mb-3 d-flex justify-content-between w-50">
        @if(request()->has('view_deleted'))
            <a class="btn btn-outline-info" href="{{route('admin.fertilizer.index')}}">Посмотреть все</a>
            <a class="btn btn-outline-info" href="{{route('admin.fertilizer.restore_all')}}">Восстановить все</a>
        @else
            <a class="btn btn-outline-info" href="{{route('admin.fertilizer.create')}}">Создать</a>
            <a class="btn btn-outline-info"
               href="{{route('admin.fertilizer.index', ['view_deleted' => 'DeletedRecords'])}}">Посмотреть
                удаленные</a>
        @endif

    </div>
    <table class="table table-info table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Наименование</th>
            <th scope="col">Действия</th>


        </tr>
        </thead>
        <tbody>

        @foreach($fertilizers as $fertilizer)
            <tr>
                <th scope="row">{{$fertilizer->id}}</th>
                <td>{{$fertilizer->title}}</td>
                @if(request()->has('view_deleted'))
                    <td><a href="{{route('admin.fertilizer.restore', $fertilizer->id)}}">Восстановить</a></td>
                    <td><a href="{{route('admin.fertilizer.force_delete', $fertilizer->id)}}">Удалить навсегда</a></td>
                @else
                    <td><a href="{{route('admin.fertilizer.edit', $fertilizer->id)}}">Редактировать</a></td>
                    <td>@include('admin.fertilizer.delete.destroy')</td>

                @endif
            </tr>

        @endforeach

        </tbody>
    </table>

@endsection
