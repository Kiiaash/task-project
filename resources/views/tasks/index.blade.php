@extends('layouts.app')

@section('content')
    <div class="card m-2 mx-4">
        <div class="card-header text-center fw-bold fs-4">
            Task Creator
        </div>
        <div class="card-body">
            <h5 class="card-title">Add your tasks here</h5>
            <p class="card-text">Insert your tasks, get them done later</p>
            <form method="post" action="{{ route('tasks.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="task_area" class="form-label">Task:</label>
                    <textarea class="form-control form-control-lg @error('task_main') is-invalid @enderror" id="task_area" name="task_main"></textarea>
                    @error('task_main')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div id="taskHelp" class="form-text">I'm here to help you with your tasks</div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary bg-lg d-blcok">Add</button>
                </div>
            </form>
        </div>
    </div>
    <hr class="w-75 bg-secondery m-5 mx-auto">
    @if ($cards->all())
        @foreach ($cards as $card)
            <x-card :card="$card" name="task_card" id="TCard"></x-card>
        @endforeach
    @else
        <div class="alert alert-primary d-flex align-items-center mx-5" role="alert">
            <div>
                <span class="fs-4">&#8505; </span> Right now there are no tasks
            </div>
        </div>
    @endif
@endsection
