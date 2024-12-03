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
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Task:</label>
          <textarea class="form-control form-control-lg"></textarea>
          <div id="emailHelp" class="form-text">I'm here to help you with your tasks</div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary bg-lg d-blcok">Add</button>
        </div>
      </form>
    </div>
  </div>
    

@endsection