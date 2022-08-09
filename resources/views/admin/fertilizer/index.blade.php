@extends('admin.layouts.main')
@section('content')
    @if(session('status'))
        @if(session('status') == 'finished')
            <div class="alert alert-default-success">
                Данные загружены успешно
            </div>
        @else
            <div class="alert alert-default-danger">
                Данные не загружены
            </div>
        @endif
    @endif

    @if($errors->any())
        <div class="alert alert-default-danger">
            <h5 class="text-danger"> Ошибки при загрузке: </h5>
            <ol>
                @foreach($errors->all() as $error)
                   <li> {{$error}}</li>
                @endforeach
            </ol>
        </div>
    @endif

    <h3>Удобрения</h3>
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

                                <form action="{{route('admin.fertilizer.export')}}" method="get">
                                    <button type="submit" class="btn btn-outline-success">Сохранить данные в Excel</button>
                                </form>
                            @endif

                        </div>
                        <div class="">
                            <table class="table table-info table-hover table-sm table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    @if(request()->has('view_deleted'))
                                        <th scope="col">

                                            Наименование
                                        </th>
                                    @else
                                        <th scope="col">
                                            @sortablelink('title', 'Наименование')
                                        </th>
                                    @endif
                                    <th scope="col">Нормы азота</th>
                                    <th scope="col">Нормы фосфора</th>
                                    <th scope="col">Нормы калия</th>
                                    <th scope="col">Культура</th>
                                    <th scope="col">Район</th>
                                    @if(request()->has('view_deleted'))
                                        <th scope="col">Стоимость</th>
                                    @else
                                        <th scope="col">@sortablelink('cost', 'Стоимость')</th>
                                    @endif
                                    <th scope="col">Описание</th>
                                    <th scope="col">Назначение</th>
                                    <th scope="col">Действия</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($fertilizers as $fertilizer)
                                    <tr>
                                        <th scope="row">{{$fertilizer->id}}</th>
                                        <td>
                                            <a href="{{route('admin.fertilizer.show', $fertilizer->id)}}">
                                            {{$fertilizer->title}}</td>
                                        </a>
                                        <td>{{$fertilizer->norm_azot}}</td>
                                        <td>{{$fertilizer->norm_fosfor}}</td>
                                        <td>{{$fertilizer->norm_kalii}}</td>
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
                        <div>
                            @if(request()->has('view_deleted'))
                            @else
                                {{$fertilizers->withQueryString()->links()}}
                            @endif
                        </div>
                    </div>
                    @if(request()->has('view_deleted'))
                    @else
                        <div class="w-25 ml-3 mt-5">

                            <form class="mb-3" action="{{route('admin.fertilizer.excel')}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputFile">Загрузить Excel файл</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="fertilizer_excel">
                                            <label class="custom-file-label"></label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Выбрать файл</span>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-outline-secondary" type="submit">Импортировать</button>
                            </form>

                            <form class="" action="{{route('admin.fertilizer.index')}}" method="get">
                                <div class="d-flex flex-column">

                                    <label class="form-label mb-n1">Поиск по наименованию,<br>
                                        описанию,<br>
                                        назначению
                                    </label>
                                    <input class="mb-3 form-control" name="search_field"
                                           @if(isset($_GET['search_field'])) value="{{$_GET['search_field']}}"
                                           @endif type="text" class="form-control" placeholder="Введите наименование">


                                    {{--                                    <label class="form-label mb-n1">Нормы азота</label>--}}
                                    {{--                                    @if(isset($_GET['norm_azota_field']))--}}
                                    {{--                                        {{$normAzotMin}} - {{$_GET['norm_azota_field']}}--}}
                                    {{--                                    @else--}}
                                    {{--                                        {{$normAzotMin}} - {{$normAzotMax}}--}}
                                    {{--                                    @endif--}}
                                    {{--                                    <input--}}
                                    {{--                                        @if(isset($_GET['norm_azota_field'])) value="{{$_GET['norm_azota_field']}}"--}}
                                    {{--                                        @endif--}}
                                    {{--                                        type="range" value="{{$normAzotMax}}"--}}
                                    {{--                                        min="{{$normAzotMin}}"--}}
                                    {{--                                        max="{{$normAzotMax}}"--}}
                                    {{--                                        oninput="num.value = this.value"--}}
                                    {{--                                        name="norm_azota_field"--}}
                                    {{--                                    >--}}
                                    {{--                                    <output class="mb-3" id="num"></output>--}}

                                    <div class="d-flex flex-column mb-3">
                                        <label class="form-label mb-n1 text-center">Нормы азота</label>
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label mb-n1 text-center">Min
                                                <input class="mb-3 form-control " name="azot_min"
                                                       @if(isset($_GET['azot_min']))
                                                           value="{{$_GET['azot_min']}}"
                                                       @else
                                                           value="{{$normAzotMin}}"
                                                       @endif type="number" class="form-control"
                                                       placeholder="Введите мин значение">
                                            </label>

                                            <label class="form-label mb-n1 text-center">Max
                                                <input class="mb-3 form-control " name="azot_max"
                                                       @if(isset($_GET['azot_max']))
                                                           value="{{$_GET['azot_max']}}"
                                                       @else
                                                           value="{{$normAzotMax}}"
                                                       @endif type="number" class="form-control"
                                                       placeholder="Введите макс значение">
                                            </label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column mb-3">
                                        <label class="form-label mb-n1 text-center">Нормы фосфора</label>
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label mb-n1 text-center">Min
                                                <input class="mb-3 form-control " name="fosfor_min"
                                                       @if(isset($_GET['fosfor_min']))
                                                           value="{{$_GET['fosfor_min']}}"
                                                       @else
                                                           value="{{$normFostorMin}}"
                                                       @endif type="number" class="form-control"
                                                       placeholder="Введите мин значение">
                                            </label>

                                            <label class="form-label mb-n1 text-center">Max
                                                <input class="mb-3 form-control " name="fosfor_max"
                                                       @if(isset($_GET['fosfor_max']))
                                                           value="{{$_GET['fosfor_max']}}"
                                                       @else
                                                           value="{{$normFostorMax}}"
                                                       @endif type="number" class="form-control"
                                                       placeholder="Введите макс значение">
                                            </label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column mb-3">
                                        <label class="form-label mb-n1 text-center">Нормы калия</label>
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label mb-n1 text-center">Min
                                                <input class="mb-3 form-control " name="kalii_min"
                                                       @if(isset($_GET['kalii_min']))
                                                           value="{{$_GET['kalii_min']}}"
                                                       @else
                                                           value="{{$normKaliiMin}}"
                                                       @endif type="number" class="form-control"
                                                       placeholder="Введите мин значение">
                                            </label>

                                            <label class="form-label mb-n1 text-center">Max
                                                <input class="mb-3 form-control " name="kalii_max"
                                                       @if(isset($_GET['kalii_max']))
                                                           value="{{$_GET['kalii_max']}}"
                                                       @else
                                                           value="{{$normKaliiMax}}"
                                                       @endif type="number" class="form-control"
                                                       placeholder="Введите макс значение">
                                            </label>
                                        </div>
                                    </div>


                                    <div class="d-flex flex-column mb-3">
                                        <label class="form-label mb-n1 text-center">Стоимость</label>
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label mb-n1 text-center">Min
                                                <input class="mb-3 form-control " name="cost_min"
                                                       @if(isset($_GET['cost_min']))
                                                           value="{{$_GET['cost_min']}}"
                                                       @else
                                                           value="{{$normCostMin}}"
                                                       @endif type="number" class="form-control"
                                                       placeholder="Введите мин значение">
                                            </label>

                                            <label class="form-label mb-n1 text-center">Max
                                                <input class="mb-3 form-control " name="cost_max"
                                                       @if(isset($_GET['cost_max']))
                                                           value="{{$_GET['cost_max']}}"
                                                       @else
                                                           value="{{$normCostMax}}"
                                                       @endif type="number" class="form-control"
                                                       placeholder="Введите макс значение">
                                            </label>
                                        </div>
                                    </div>

                                    <label class="form-label mb-n1">Культуры</label>
                                    <select multiple class="form-select form-control mb-3 form-select-lg"
                                            name="culture_search[]">
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
                                    <select multiple class="form-select form-control mb-3" name="raion_search[]">
                                        @foreach($raions as $raion)
                                            <option
                                                value="{{$raion->id}}"
                                            @if(isset($_GET['raion_search']))
                                                {{ is_array($_GET['raion_search']) &&
                                                in_array($raion->id, $_GET['raion_search'])
                                                ? 'selected' : ''}}
                                                @endif

                                            >{{$raion->raion}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary w-50 mb-3">Установить фильтр</button>

                                </div>
                            </form>
                            <form class="" action="{{route('admin.fertilizer.index')}}" method="get">
                                <button type="submit" class="btn btn-success w-50 mb-3">Сбросить все фильтры</button>
                            </form>
                        </div>
                    @endif
            </div>

@endsection
