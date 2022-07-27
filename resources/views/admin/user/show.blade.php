@extends('admin.layouts.main')
@section('content')
    <div class="mb-3 d-flex justify-content-between">
        <a class="btn btn-outline-warning" href="{{route('admin.user.edit', $user->id)}}">Edit</a>
        @include('admin.user.delete.destroy')
    </div>
    <table class="table table-info table-hover">

        <tr>
            <th scope="col">#</th>
            <th scope="row">{{$user->id}}</th>
        </tr>
        <tr>
            <th scope="col">Наименование</th>
            <td>{{$user->name}}</td>

        </tr>

    </table>
@endsection
