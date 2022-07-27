<form action="{{route('admin.user.destroy', $user->id)}}" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-outline-warning">Удалить</button>
</form>
