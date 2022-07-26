@extends('admin.layouts.main')
@section('content')
    <div class="mb-3">
       <a class="btn btn-outline-secondary" href="{{route('admin.culture.index')}}">На главную</a>
    </div>
    <form action="{{route('admin.culture.store')}}" method="post">
        @csrf
        @method('post')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" value="{{old('title')}}" name="title" class="form-control" placeholder="title">
        @error('title')
            {{$message}}
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
