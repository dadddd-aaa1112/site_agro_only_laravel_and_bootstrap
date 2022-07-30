@extends('admin.layouts.main')
@section('content')
    <div class="d-flex ">
        @if(request()->has('view_deleted'))
            <div class="w-100">
                @else
                    <div class="w-75">
                        @endif

                        <div class="mb-3 d-flex justify-content-between w-50">
                            @if(request()->has('view_deleted'))
                                <a class="btn btn-outline-info" href="{{route('admin.fertilizer.index')}}">Посмотреть
                                    все</a>
                                <a class="btn btn-outline-info" href="{{route('admin.fertilizer.restore_all')}}">Восстановить
                                    все</a>
                            @else
                                <a class="btn btn-outline-info" href="{{route('admin.fertilizer.create')}}">Создать</a>
                                <a class="btn btn-outline-info"
                                   href="{{route('admin.fertilizer.index', ['view_deleted' => 'DeletedRecords'])}}">Посмотреть
                                    удаленные</a>
                            @endif

                        </div>
                        <div class="">
                            <table class="table table-info table-hover table-sm ">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Наименование</th>
                                    <th scope="col">Нормы азота</th>
                                    <th scope="col">Нормы фосфора</th>
                                    <th scope="col">Нормы калия</th>
                                    <th scope="col">culture_id</th>
                                    <th scope="col">Культура</th>
                                    <th scope="col">Район</th>
                                    <th scope="col">Цена</th>
                                    <th scope="col">Описание</th>
                                    <th scope="col">Назначение</th>


                                </tr>
                                </thead>
                                <tbody>

                                @foreach($fertilizers as $fertilizer)
                                    <tr>
                                        <th scope="row">{{$fertilizer->id}}</th>
                                        <td>{{$fertilizer->title}}</td>
                                        <td>{{$fertilizer->norm_azot}}</td>
                                        <td>{{$fertilizer->norm_fosfor}}</td>
                                        <td>{{$fertilizer->norm_kalii}}</td>
                                        <td>{{$fertilizer->culture_id}}</td>
                                        <td>{{$fertilizer->cultures->title}}</td>
                                        <td>{{$fertilizer->raion}}</td>
                                        <td>{{$fertilizer->cost}}</td>
                                        <td>{{$fertilizer->description}}</td>
                                        <td>{{$fertilizer->target}}</td>
                                        @if(request()->has('view_deleted'))
                                            <td><a href="{{route('admin.fertilizer.restore', $fertilizer->id)}}">Восстановить</a>
                                            </td>
                                            <td><a href="{{route('admin.fertilizer.force_delete', $fertilizer->id)}}">Удалить
                                                    навсегда</a></td>
                                        @else
                                            <td><a href="{{route('admin.fertilizer.edit', $fertilizer->id)}}">Редактировать</a>
                                            </td>
                                            <td>@include('admin.fertilizer.delete.destroy')</td>

                                        @endif
                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if(request()->has('view_deleted'))
                    @else
                        <div class="w-25 ml-3 mt-5">
                            <form class="" action="{{route('admin.fertilizer.index')}}" method="get">
                                <div class="d-flex flex-column">

                                    <label class="form-label mb-n1">Поиск по наименованию</label>
                                    <input class="mb-3 form-control" name="search_field"
                                           @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}"
                                           @endif type="text" class="form-control" placeholder="Введите наименование">
                                    {{$normAzotMin}} - {{$normAzotMax}}

                                    <input class="mb-3" type="range" value="24" min="{{$normAzotMin}}"
                                           max="{{$normAzotMax}}"
                                           name="norm_azot">

                                    <label class="form-label mb-n1">Культуры</label>
                                    <select multiple class="form-select form-control mb-3 form-select-lg" name="culture_search[]">
                                        @foreach($cultures as $culture)
                                            <option
                                                value="{{$culture->id}}"
                                            @if(isset($_GET['culture_search']))
                                                {{ is_array($_GET['culture_search']) &&
                                                in_array($culture->id, $_GET['culture_search'])
                                                ? 'selected' : ''}}
                                                @endif
                                            >{{$culture->title}}</option>
                                        @endforeach
                                    </select>

                                    <label class="form-label mb-n1">Район</label>
                                    <select class="form-select form-control mb-3" name="raion_search">
                                        <option></option>
                                        @foreach($raions as $raion)
                                            <option
                                                @if(isset($_GET['raion_search']))
                                                    value="{{$raion->raion}}"
                                                @endif
                                            >{{$raion->raion}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary w-50 mb-3">Фильтр</button>

                                </div>
                            </form>

                        </div>
                    @endif
            </div>
@endsection
