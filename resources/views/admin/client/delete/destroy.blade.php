<form action="{{route('admin.client.destroy', $client->id)}}" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-outline-danger">Удалить</button>
</form>
