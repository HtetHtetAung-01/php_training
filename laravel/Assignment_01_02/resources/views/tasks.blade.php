@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-sm-offset-2 col-sm-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        New Task
      </div>

      <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="{{ url('task')}}" method="POST" class="form-horizontal">
          {{ csrf_field() }}

          <!-- Task Name -->
          <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Task</label>

            <div class="col-sm-6">
              <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
            </div>
          </div>

          <div class="form-group">
            <label for="task-deadline" class="col-sm-3 control-label">Deadline</label>
            <div class="col-sm-6">
              <input type="date" name="deadline" id="task-deadline" class="form-control" value="{{ old('task') }}">
            </div>
          </div>
          <div class="form-group">
            <label for="task-note" class="col-sm-3 control-label">Task Note</label>
            <div class="col-sm-6">
              <input type="text" name="note" id="task-note" class="form-control" value="{{ old('task') }}">
            </div>
          </div>

          <!-- Add Task Button -->
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-btn fa-plus"></i>Add Task
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- Current Tasks -->
    @if (count($tasks) > 0)
    <div class="panel panel-default">
      <div class="panel-heading">
        Current Tasks
        <div class="csv-btn">
          <a class="btn btn-primary upload-btn" href="importExportView">
            <i class="fa fa-btn fa-upload"></i>Upload
          </a>
          <a class="btn btn-primary download-btn" href="export">
            <i class="fa fa-btn fa-download"></i>Download
          </a>
        </div>
      </div>

      <div class="panel-body">
        <table class="table table-striped task-table">
          <thead>
            <th>Task</th>
            <th>Deadline</th>
            <th>Task Notes</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </thead>
          <tbody>
            @foreach ($tasks as $task)
            <tr>
              <td class="table-text">
                <div>{{ $task->name }}</div>
              </td>
              <td class="table-text">
                <div>{{ $task->deadline }}</div>
              </td>
              <td class="table-text">
                <div>{{ $task->note }}</div>
              </td>
              <!-- Task Update Button -->
              <td>
                <form action="/update/{{ $task->id }}" method="POST">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-secondary">
                    <i class="fa fa-btn fa-edit"></i>Update
                  </button>
                </form>
              </td>
              <!-- Task Delete Button -->
              <td>
                <form action="{{ url('task/'.$task->id) }}" method="POST" onSubmit="return confirm('Do you want to delete this task?')">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}

                  <button type="submit" class="btn btn-danger">
                    <i class="fa fa-btn fa-trash"></i>Delete
                  </button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection