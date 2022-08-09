@extends('admin.layouts.main')
@section('content')

    @if(session('status'))
        @if(session('status') == 'finished')
            <div class="alert alert-default-success">
                Данные загружены успешно

            </div>
        @elseif(session('status') == 'failed')
            <div class="alert alert-default-danger">
                Данные не загружены
            </div>
        @else
            <div class="alert alert-default-info">
                В процессе загрузки<br>

            </div>
        @endif
    @endif


    @if($errors->any())
        <div class="alert alert-default-danger">
            <h5 class="text-danger"> Ошибки при загрузке: </h5>
            <ol>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ol>
        </div>
    @endif

    <h3>Клиенты</h3>
    <div class="d-flex">

        @if(request()->has('view_deleted'))
            <div class="w-100">
                @else
                    <div class="w-75">
                        @endif

                        <div class="mb-3 d-flex justify-content-between w-50">
                            @if(request()->has('view_deleted'))
                                <a class="btn btn-outline-secondary" href="{{route('admin.client.index')}}">Посмотреть
                                    все</a>
                                <a class="btn btn-outline-secondary" href="{{route('admin.client.restore_all')}}">Восстановить
                                    все</a>
                            @else
                                <a class="btn btn-outline-secondary"
                                   href="{{route('admin.client.create')}}">Создать</a>
                                <a class="btn btn-outline-secondary"
                                   href="{{route('admin.client.index', ['view_deleted' => 'DeletedRecords'])}}">Посмотреть
                                    удаленные</a>

                                <form action="{{route('admin.client.export')}}" method="get">
                                    <button type="submit" class="btn btn-outline-success">Сохранить данные в Excel
                                    </button>
                                </form>




                            @endif

                        </div>
                        <table class="table table-dark table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                @if(request()->has('view_deleted'))
                                    <th scope="col">Наименование</th>
                                @else

                                    <th scope="col">@sortablelink('title','Наименование')</th>
                                @endif
                                <th scope="col">Дата контракта</th>
                                @if(request()->has('view_deleted'))
                                    <th scope="col">Цена поставки</th>
                                @else
                                    <th scope="col">@sortablelink('cost_deliveries','Цена поставки')</th>
                                @endif
                                <th scope="col">Регион</th>
                                <th scope="col">Действия</th>

                            </tr>
                            </thead>
                            <tbody>

                            @foreach($clients as $client)
                                <tr>
                                    <th scope="row">{{$client->id}}</th>
                                    <td><a href="{{route('admin.client.show', $client->id)}}">{{$client->title}}</a>
                                    </td>
                                    <td>{{$client->contract_date}}</td>
                                    <td>{{$client->cost_deliveries}}</td>
                                    <td>{{$client->region}}</td>
                                    @if(request()->has('view_deleted'))
                                        <td>
                                            <a href="{{route('admin.client.restore', $client->id)}}">Восстановить</a>
                                        </td>
                                        <td><a href="{{route('admin.client.force_delete', $client->id)}}">Удалить
                                                навсегда</a></td>
                                    @else
                                        <td><a href="{{route('admin.client.edit', $client->id)}}">Редактировать</a>
                                        </td>
                                        <td>@include('admin.client.delete.destroy')</td>
                                        <td>
                                            <a class="btn btn-outline-info" href="{{route('admin.document.dogovor', $client->id)}}">Сформировать бланк договора</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        @if(request()->has('view_deleted'))
                        @else
                            {{$clients->withQueryString()->links()}}
                        @endif
                    </div>


                    @if(request()->has('view_deleted'))
                        <div class="">
                            @else
                                <div class="w-25 mt-5 ml-3 mr-3">

                                    <form class="mb-3" action="{{route('admin.client.excel')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputFile">Загрузить Excel файл</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input"
                                                           name="client_excel">
                                                    <label class="custom-file-label"></label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Выбрать файл</span>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-outline-secondary" type="submit">Импортировать</button>
                                    </form>


                                    <form class="mb-3" action="{{route('admin.client.index')}}" method="get">
                                        <div class="d-flex flex-column">
                                            <label class="mb-n1 w-100">Поиск по наименованию</label>
                                            <input name="title_search"

                                                   @if(isset($_GET['title_search']))
                                                       value="{{$_GET['title_search']}}"
                                                   @endif
                                                   type="text"
                                                   class="mb-3 form-control"
                                                   placeholder="Введите наименование">


                                            <div class="d-flex flex-column mb-3">
                                                <label class="form-label mb-n1 text-center">Дата контракта</label>
                                                <div class="d-flex justify-content-between">
                                                    <label class="form-label mb-n1 text-center">Min
                                                        <input type="date"
                                                               name="date_min"
                                                               placeholder="Введите мин дату"
                                                               class="mb-3 form-control "
                                                               @if(isset($_GET['date_min']))
                                                                   value="{{$_GET['date_min']}}"
                                                               @else
                                                                   value="{{$contractsDateMin}}"
                                                            @endif
                                                        >
                                                    </label>

                                                    <label class="form-label mb-n1 text-center">Max
                                                        <input class="mb-3 form-control "
                                                               name="date_max"
                                                               @if(isset($_GET['date_max']))
                                                                   value="{{$_GET['date_max']}}"
                                                               @else
                                                                   value="{{$contractsDateMax}}"
                                                               @endif
                                                               type="date"
                                                               placeholder="Введите макс дату">
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="d-flex flex-column mb-3">
                                                <label class="form-label mb-n1 text-center">Стоимость
                                                    поставки</label>
                                                <div class="d-flex justify-content-between">
                                                    <label class="form-label mb-n1 text-center">Min
                                                        <input type="number"
                                                               name="cost_min"
                                                               placeholder="Введите мин значение"
                                                               class="mb-3 form-control mr-3"
                                                               @if(isset($_GET['cost_min']))
                                                                   value="{{$_GET['cost_min']}}"
                                                               @else
                                                                   value="{{$costMin}}"
                                                            @endif
                                                        >
                                                    </label>

                                                    <label class="form-label mb-n1 text-center">Max
                                                        <input class="mb-3 form-control ml-3"
                                                               name="cost_max"
                                                               @if(isset($_GET['cost_max']))
                                                                   value="{{$_GET['cost_max']}}"
                                                               @else
                                                                   value="{{$costMax}}"
                                                               @endif
                                                               type="number"
                                                               placeholder="Введите макс значение">
                                                    </label>
                                                </div>
                                            </div>


                                            <label class="form-label mb-n1">Регион</label>
                                            <select multiple class="form-select form-control mb-3 form-select-lg"
                                                    name="region_search[]">
                                                @foreach($regions as $region)
                                                    <option
                                                        value="{{$region->id}}"
                                                    @if(isset($_GET['region_search']))
                                                        {{ is_array($_GET['region_search']) &&
                                                        in_array($region->id, $_GET['region_search'])
                                                        ? 'selected' : ''}}
                                                        @endif
                                                    >{{$region->region}}</option>
                                                @endforeach
                                            </select>


                                            <button type="submit" class="btn btn-primary w-50">Установить фильтр
                                            </button>
                                        </div>
                                    </form>
                                    <form action="{{route('admin.client.index')}}" method="get">
                                        <button type="submit" class="btn btn-success w-50">Сбросить все фильтры
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>

@endsection
