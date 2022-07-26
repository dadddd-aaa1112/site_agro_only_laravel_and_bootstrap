@extends('admin.layouts.main')
@section('content')
    <div class="mb-3">
        <a class="btn btn-outline-secondary" href="{{route('admin.fertilizer.index')}}">На главную</a>
    </div>
    <form action="{{route('admin.fertilizer.update', $fertilizer->id)}}" method="post">
        @csrf
        @method('patch')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" value="{{$fertilizer->title}}" name="title" class="form-control" placeholder="title">
                @error('title')
                {{$message}}
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">norm_azot</label>
                <input type="number" step="0.01" value="{{$fertilizer->norm_azot}}" name="norm_azot" class="form-control"
                       placeholder="norm_azot">
                @error('norm_azot')
                {{$message}}
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">norm_fosfor</label>
                <input type="number" step="0.01" value="{{$fertilizer->norm_fosfor}}" name="norm_fosfor" class="form-control"
                       placeholder="norm_fosfor">
                @error('norm_fosfor')
                {{$message}}
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">norm_kalii</label>
                <input type="number" step="0.01" value="{{$fertilizer->norm_kalii}}" name="norm_kalii" class="form-control"
                       placeholder="norm_kalii">
                @error('norm_kalii')
                {{$message}}
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">culture_id</label>


                <select class="form-control" name="culture_id">
                    @foreach($cultures as $culture)
                        <option value="{{$culture->id}}"
                            {{$culture->id == $fertilizer->culture_id ? 'selected' : ''}}
                        >{{$culture->title}}</option>
                    @endforeach
                </select>

                @error('culture_id')
                {{$message}}
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">raion</label>
                <input type="text" value="{{$fertilizer->raion}}" name="raion" class="form-control"
                       placeholder="raion">
                @error('raion')
                {{$message}}
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">cost</label>
                <input type="number" step="0.01" value="{{$fertilizer->cost}}" name="cost" class="form-control"
                       placeholder="cost">
                @error('cost')
                {{$message}}
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">description</label>
                <input type="text"  value="{{$fertilizer->description}}" name="description" class="form-control"
                       placeholder="description">
                @error('description')
                {{$message}}
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">target</label>
                <input type="text" value="{{$fertilizer->target}}" name="target" class="form-control"
                       placeholder="target">
                @error('target')
                {{$message}}
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
