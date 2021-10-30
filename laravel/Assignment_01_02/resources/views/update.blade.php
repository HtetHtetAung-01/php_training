@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-sm-offset-2 col-sm-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        Update Task
      </div>
      <form action="/updateTaskValue/{{ $task->id }}" method="POST" onSubmit="return confirm('Do you want to update this task?')" class="form-horizontal">
        {{ csrf_field() }}
        <div class="form-group panel-body">
          <label for="task-name" class="col-sm-3 control-label">Task</label>
          <div class="col-sm-6">
            <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
          </div>
        </div>

        <div class="form-group panel-body">
          <label for="task-deadline" class="col-sm-3 control-label">Deadline</label>
          <div class="col-sm-6">
            <input type="date" name="deadline" id="task-deadline" class="form-control" value="{{ $task->deadline }}">
          </div>
        </div>
        <div class="form-group panel-body">
          <label for="task-note" class="col-sm-3 control-label">Task Note</label>
          <div class="col-sm-6">
            <input type="text" name="note" id="task-note" class="form-control" value="{{ $task->note }}">
          </div>
        </div>
        <div class="form-group panel-body">
          <div class="col-sm-12  text-center">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  @endsection