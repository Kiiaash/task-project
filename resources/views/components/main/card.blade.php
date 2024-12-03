<div class="card text-center col-md-3 m-5 float-start" name={{ $name }} id={{ $id }}>
    <div class="card-header">Task #{{ $card->id }}</div>
    <div class="card-body">
        <p class="card-text">{{ $card->task }}</p>
        <form action="{{ route('tasks.destroy', $card->id) }}" method="POST">
            @csrf
            @method('delete')
            <input type="submit" name="X" value="X" class="btn btn-danger">
        </form>
    </div>
    <div class="card-footer text-body-secondary">
        {{ $card->created_at->diffForHumans() }}
    </div>
</div>