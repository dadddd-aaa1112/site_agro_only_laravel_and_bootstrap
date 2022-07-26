<form action="{{route('admin.fertilizer.destroy', $fertilizer->id)}}" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-outline-warning">Удалить</button>
</form>
